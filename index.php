<?php

/**
 * Here we bootstrap the application and  route.
 *
 * PHP version 5.6
 */

$base  = dirname($_SERVER['PHP_SELF']);

// Update request when we have a subdirectory
if (ltrim($base, '/')) {
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

require_once __DIR__ . '/vendor/autoload.php';

// Define application environment
defined('APPLICATION_ENV')
    || define(
        'APPLICATION_ENV',
        (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
        : 'production')
    );

// Config
require_once __DIR__ . '/includes/bootstrap.php';

$klein = new \Klein\Klein();

$klein->respond(
    function ($request, $response, $service, $app) use ($klein) {
        // Init database connection.
        $app->db = new mysqli(HOST, USER, PASSWORD, DATABASE);
    
        // Init the session.
        $service->startSession();

        // Show login or ?
        $condition = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
        $app->isLogged = ($condition) ? true : false;

        if ($app->isLogged) {
            $service->layout('views/layout-in.phtml');    
        } else {
            $service->layout('views/layout-out.phtml');        
        }

        // Any messages ?
        $service->messages = $service->flashes(); 
    }
);

// Homepage && Login page.
$klein->respond(
    'GET', '/', function ($request, $response, $service, $app) {
        if ($app->isLogged) {
            $response->redirect(BASE_PATH . '/index')->send();
        }

        $service->render('views/sign-in.phtml');
    }
);

$klein->respond(
    'POST', '/', function ($request, $response, $service, $app) {
        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        if ($controller->login($request,  $app)) {
            $response->redirect(BASE_PATH . '/index')->send();
        } else {
            $service->flash('datele introduse nu sunt corecte.', 'alert-danger');
            $service->back();
        }

        $service->render('views/sign-in.phtml');
    }
);

// Loggout action.
$klein->respond(
    'POST', '/logout', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }
    
        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        $controller->logout();

        $response->redirect(BASE_PATH)->send();
    }
);

// Homepage after loggin.
$klein->respond(
    '/index', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/materials.php';
        $materials = new Materials();
        $service->materials = $materials->listMaterials($app);
        $service->materialsCount = count($service->materials);

        // Load products.
        include_once __DIR__ . '/includes/molds.php';

        $controller = new Molds();
        $service->molds = $controller->listMolds($materials, $request, $app);

        $service->paramsGET = $request->paramsGET();
        $service->orderby = array(
            '' => '--Alege--',
            'greutate' => 'Greutate Kg/mc',
            'greutate_fara_cule' => 'Greutate /buc',
            'ciclu_inj' => 'Timp injectie',
        );
        $service->sort = array(
            '' => '--Alege--',
            'asc' => 'Ascendent',
            'desc' => 'Descendent',
        );

        $service->render('views/index.phtml');
    }
);

// Mold CRUD
$klein->respond(
    'GET', '/add-mold', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/materials.php';
        $controller = new Materials();
        $service->materials = $controller->listMaterials($app);

        $service->render('views/add-mold.phtml');
    }
);

$klein->respond(
    'POST', '/add-mold', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/molds.php';

        $controller = new Molds();
        $id = $controller->addMold($request, $service, $app);

        if ($id) {
            $service->flash('Matrita a fost adaugata cu succes.', 'alert-success');
            $response->redirect(BASE_PATH . '/index#mold-' . $id)->send();
        }
    
        $service->render('views/add-mold.phtml');
    }
);

$klein->respond(
    'GET', '/edit-mold/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();    
        }

        // Load product.
        include_once __DIR__ . '/includes/molds.php';
        $controller = new Molds();
        $service->mold = $controller->getMold($id, $app);

        include_once __DIR__ . '/includes/materials.php';
        $controller = new Materials();
        $service->materials = $controller->listMaterials($app);

        $service->render('views/edit-mold.phtml');
    }
);

$klein->respond(
    'POST', '/edit-mold/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/molds.php';

        $controller = new Molds();
        $result = $controller->updateMold($id, $request, $service, $app);

        if ($result) {
            $service->flash('Matrita a fost modificata cu succes.', 'alert-success');
        }

        $response->redirect(BASE_PATH . '/edit-mold/' . $id)->send();
    }
);

$klein->respond(
    'GET', '/delete-mold/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/molds.php';

        $controller = new Molds();
        $result = $controller->deleteMold($id, $app);

        if ($result) {
            $service->flash('Matrita a fost stearsa.', 'alert-success');
            $response->redirect(BASE_PATH . '/index')->send();
        } else {
            $service->flash('Matrita nu a putut fi stearsa.', 'alert-danger');
        }

        $response->redirect(BASE_PATH . '/edit-mold/' . $id)->send();
    }
);

$klein->respond(
    'GET', '/delete-file/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/molds.php';

        $controller = new Molds();
        $result = $controller->deleteFile($id, $app);

        if ($result) {
            $service->flash('Fisierul a fost sters.', 'alert-success');
        } else {
            $service->flash('Fisierul nu a putut fi sters.', 'alert-danger');
        }

        $response->redirect(BASE_PATH . '/edit-mold/' . $id)->send();
    }
);

// Users CRUD
$klein->respond(
    'GET', '/users', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        $controller->listUsers($service, $app);

        $service->render('views/users.phtml');
    }
);

$klein->respond(
    'GET', '/edit-user/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();    
        }

        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        $user = $controller->getUser($id, $service, $app);
    
        $service->render('views/edit-user.phtml');
    }
);

$klein->respond(
    'POST', '/edit-user/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();    
        }

        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        $result = $controller->editUser($id, $request, $service, $app);

        if ($result) {
            $response->redirect(BASE_PATH.'/users')->send();    
        }
    
        $service->render('views/edit-user.phtml');
    }
);

$klein->respond(
    'GET', '/add-user', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }
    
        $service->render('views/add-user.phtml');
    }
);

$klein->respond(
    'POST', '/add-user', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        $result = $controller->addUser($request, $service, $app);

        if ($result) {
            $response->redirect(BASE_PATH.'/users')->send();    
        }
    
        $service->render('views/add-user.phtml');
    }
);

$klein->respond(
    'GET', '/delete-user/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();    
        }

        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        $result = $controller->deleteUser($id, $request, $service, $app);

        $response->redirect(BASE_PATH.'/users')->send();
    }
);

// Material CRUD
$klein->respond(
    'GET', '/materials', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/materials.php';

        $controller = new Materials();
        $service->materials = $controller->listMaterials($app);

        $service->render('views/materials.phtml');
    }
);

$klein->respond(
    'GET', '/add-material', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }
    
        $service->render('views/add-material.phtml');
    }
);

$klein->respond(
    'POST', '/add-material', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/materials.php';

        $controller = new Materials();
        $result = $controller->addMaterial($request, $service, $app);

        if ($result) {
            $response->redirect(BASE_PATH.'/materials')->send();    
        }
    
        $service->render('views/add-material.phtml');
    }
);

$klein->respond(
    'GET', '/edit-material/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();    
        }

        include_once __DIR__ . '/includes/materials.php';

        $controller = new Materials();
        $service->material = $controller->getMaterial($id, $app);
    
        $service->render('views/edit-material.phtml');
    }
);

$klein->respond(
    'POST', '/edit-material/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();    
        }

        include_once __DIR__ . '/includes/materials.php';

        $controller = new Materials();
        $result = $controller->editMaterial($id, $request, $service, $app);

        if ($result) {
            $response->redirect(BASE_PATH.'/materials')->send();    
        }
    
        $service->render('views/edit-material.phtml');
    }
);

$klein->respond(
    'GET', '/delete-material/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $id = $request->param('id', false);

        if (!$id) {
            $response->redirect(BASE_PATH)->send();    
        }

        include_once __DIR__ . '/includes/materials.php';

        $controller = new Materials();
        $result = $controller->deleteMaterial($id, $request, $service, $app);

        $response->redirect(BASE_PATH.'/materials')->send();
    }
);

// Page not found.
$klein->respond(
    '/404', function ($request, $response, $service) {
        $service->render('views/404.phtml');
    }
);

$klein->onHttpError(
    function ($code, $router) {
        if ($code == 404) {
            $router->response()->redirect('404', 404)->send();
        }
    }
);

$klein->dispatch();
