<?php
//namespace Config;

//use Controllers;

class Router {
	protected $resource; //what are we manipulating? A product? An order?
	protected $action; //what are we doing with that resource?

	function __construct() {
		$this->set_resource();
		$this->set_action();
	}

	private function set_resource() {

		//which resource are we handling?
		if ( ! isset($_GET['resource']) && !isset($_POST['resource'])) {
			//default is product resource
		   $this->resource = 'product';
		} elseif ( isset($_POST['resource'])) {
			$this->resource = $_POST['resource'];
		} else {
			$this->resource = $_GET['resource'];
		}
		return true;
	}

	private function set_action() {
		//default action is 'index'
		if ( ! isset($_GET['action']) && !isset($_POST['action'])) {
		   $action = 'index';
		} elseif ( isset($_POST['action'])) {
			$action = $_POST['action'];
		} else {
			$action = $_GET['action'];
		}
		
		// only allow these actions
		$allowed = array('create', 'new', 'show', 'edit', 'update', 'index', 'destroy');

		//don't just run any old action
		if ( ! in_array($action, $allowed)) {
		   die('invalid');
		} else {
			$this->action = $action;
			return true;
		}
	}

	public function getController() {
		switch($this->resource) {
			//redundant now, useful when other controllers are added
			case 'product':
				try {
					$controller = new ProductController;
					return $controller;
				} catch(Exception $e) {
					echo "<strong>Can't create controller object: </strong>" . $this->resource . "<br/>";
				}
				
				break;
			case 'customer':
				try {
					$controller = new CustomerController;
					return $controller;
				} catch(Exception $e) {
					echo "<strong>Can't create controller object: </strong>" . $this->resource . "<br/>";
				}
				
				break;
			case 'order':
				try {
					$controller = new ProductOrderController;
					return $controller;
				} catch(Exception $e) {
					echo "<strong>Can't create controller object: </strong>" . $this->resource . "<br/>";
				}
				
				break;
		}
	}

	public function getResourceName() {
		return $this->resource;
	}

	public function getAction() {
		return $this->action;
	}
}
?>