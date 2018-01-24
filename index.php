<?php

/**
 * Here we bootstrap the application and route.
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
    
    }
);

// Homepage && Login page.
$klein->respond(
    'GET', '/', function ($request, $response, $service, $app) {
        if ($app->isLogged) {
            $response->redirect('index');
        }
        
        // Any login error ?
        $service->messages = $service->flashes();

        $service->render('views/sign-in.phtml');
    }
);

$klein->respond(
    'POST', '/', function ($request, $response, $service, $app) {
        include_once __DIR__ . '/includes/users.php';

        $controller = new Users();
        if ($controller->login($request,  $app)) {
            $response->redirect('index');
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

        $controller = new Materials();
        $controller->listMaterials($service, $app);

        // Load products.
        include_once __DIR__ . '/includes/molds.php';

        $controller = new Molds();
        $service->molds = $controller->listMolds($request, $app);

        $service->render('views/index.phtml');
    }
);

// Mold CRUD
$klein->respond(
    'GET', '/mold', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $service->render('views/mold.phtml');
    }
);

$klein->respond(
    'GET', '/add-mold', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        include_once __DIR__ . '/includes/materials.php';
        $controller = new Materials();
        $controller->listMaterials($service, $app);

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
        $result = $controller->addMold($request, $app);

        if ($result) {
            $response->redirect(BASE_PATH.'/mold')->send();    
        }
    
        $service->render('views/add-mold.phtml');
    }
);

$klein->respond(
    'GET', '/edit-mold/[i:id]', function ($request, $response, $service, $app) {
        if (!$app->isLogged) {
            $response->redirect(BASE_PATH)->send();
        }

        $service->render('views/add-mold.phtml');
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
        $controller->listMaterials($service, $app);

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
        $material = $controller->getMaterial($id, $service, $app);
    
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
