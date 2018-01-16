<?php

$base  = dirname($_SERVER['PHP_SELF']);

// Update request when we have a subdirectory
if(ltrim($base, '/')){ 
	$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

require_once __DIR__ . '/vendor/autoload.php';

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV',
              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
                                         : 'production'));

// Config
require_once __DIR__ . '/includes/bootstrap.php';

$klein = new \Klein\Klein();

$klein->respond(function ($request, $response, $service, $app) use ($klein) {
	// Init database connection.
	$app->db = new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	// Init the session.
	$service->startSession();

	// Show login or ?
	$app->isLogged = (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) ? TRUE : FALSE;

	if ($app->isLogged) {
		$service->layout('views/layout.phtml');	
	}
	else {
		$service->layout('views/layout-out.phtml');		
	}
	
});

// Homepage && Login page.
$klein->respond('GET', '/', function ($request, $response, $service, $app) {
	if ($app->isLogged) {
		$response->redirect('index');
	}
	
	$service->render('views/sign-in.phtml');
});

$klein->respond('POST', '/', function ($request, $response, $service, $app) {
	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
	if ($controller->login($request,  $app)) {
		$response->redirect('index');
	}

	$service->render('views/sign-in.phtml');
});

// Loggout action.
$klein->respond('POST', '/logout', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}
	
	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
	$controller->logout();

	$response->redirect(BASE_PATH)->send();
});

// Homepage after loggin.
$klein->respond('/index', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	$service->render('views/index.phtml');
});

// Mold CRUD
$klein->respond('GET', '/mold', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	$service->render('views/mold.phtml');
});

$klein->respond('GET', '/add-mold', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	$service->render('views/add-mold.phtml');
});

// Users CRUD
$klein->respond('GET', '/users', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
    $controller->list_users($service, $app);

	$service->render('views/users.phtml');
});

$klein->respond('GET', '/edit-user/[i:id]', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	$id = $request->param('id', FALSE);

	if (!$id) {
		$response->redirect(BASE_PATH)->send();	
	}

	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
	$user = $controller->getUser($id, $service, $app);
    
	$service->render('views/edit-user.phtml');
});

$klein->respond('GET', '/add-user', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
    
	$service->render('views/add-user.phtml');
});

$klein->respond('POST', '/add-user', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
	$result = $controller->addUser($request, $service, $app);

	if ($result) {
		$response->redirect(BASE_PATH.'/users')->send();	
	}
    
	$service->render('views/add-user.phtml');
});

$klein->respond('POST', '/edit-user/[i:id]', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	$id = $request->param('id', FALSE);

	if (!$id) {
		$response->redirect(BASE_PATH)->send();	
	}

	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
	$result = $controller->editUser($id, $request, $service, $app);

	if ($result) {
		$response->redirect(BASE_PATH.'/users')->send();	
	}
    
	$service->render('views/edit-user.phtml');
});

$klein->respond('GET', '/delete-user/[i:id]', function ($request, $response, $service, $app) {
	if (!$app->isLogged) {
		$response->redirect(BASE_PATH)->send();
	}

	$id = $request->param('id', FALSE);

	if (!$id) {
		$response->redirect(BASE_PATH)->send();	
	}

	require_once __DIR__ . '/includes/users.php';

	$controller = new Users();
	$result = $controller->deleteUser($id, $request, $service, $app);

	$response->redirect(BASE_PATH.'/users')->send();
});

// Page not found.
$klein->respond('/404', function ($request, $response, $service) {
	$service->render('views/404.phtml');
});

$klein->onHttpError(function ($code, $router) {
	if ($code == 404) {
		$router->response()->redirect('404', 404)->send();
	}
});

$klein->dispatch();
