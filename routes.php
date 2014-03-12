<?php

	//autoload classes
	include_once 'autoloader.php';


	// Here we create a new router object
	// to interpret which resource and action
	// are beeing called and return the proper
	// resource

	try {
		$router = new Router;
	} catch(Exception $e ) {
		echo "<strong>Can't create router object</strong><br/>";
	}

	//which resource are we handling?
	$resource = $router->getResourceName();


	//instantiate the right kind of object based on the
	// type of resource being handled
	$controller = $router->getController();

	//Here are the views
	//they can be found in directories named
	//after the resource they match
	$indexview = 'view/' . $resource . '/index_view.php';
	$showview = 'view/' . $resource . '/show_view.php';
	$editview = 'view/' . $resource . '/edit_view.php';
	$newview = 'view/' . $resource . '/new_view.php';


	//And what are we doing with that resource?
	$action = $router->getAction();

	//CRUD actions for our resources
	// Here we call the methods for the resource action
	// and render the views
	switch($action) {
		case 'show':
			// show a single item from the database
			$result = $controller->show();
			require $showview;
			break;

		case 'edit':
			// show the existing data
			$result = $controller->show();

			// fill data into an edit form
			require $editview;
			break;

		case 'update':
			//update a row in the database
			$updated = $controller->update();

			//render item view
			$result = $controller->show();
			require $showview;
			break;

		case 'create':
			//insert the item into the database
			$made = $controller->create();
			$inserted_id = $controller->index();
			$allrows = $controller->index();
			require $indexview;
			break;

		case 'new':
			// render new item view
			require $newview;
			break;

		case 'destroy':
			// delete the item from the database
			$destroyed = $controller->destroy();
			//render index view
			$allrows = $controller->index();
			require $indexview;
			break;

		case 'index':
			//grab all of our rows from the database
			$allrows = $controller->index();
			//render index view
			require $indexview;
			break;
		default:
			echo "No controller for action: " . $action . "<br>";
	}
	
?>