<?php
//namespace Controllers;

//use Models\Customer as Customer;

// this class is for handling customers and their shipping information
class CustomerController {

	public function create() {
		//grab Doctrine config
		require_once(dirname(__FILE__)."/../bootstrap.php");

		//make a new Doctrine object
		try {
			$customer = new Customer();
		} catch(Exception $e) {
			echo "<strong>Error creating Customer object: " . $e->getMessage() . "</strong><br/>";
		}

		//Grab form data
		////////////////

		//required fields
		if (isset($_POST['name']) && !empty($_POST['name'])) {
			$newCustomerName = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
			$customer->setName($newCustomerName);
		} else {
			echo "<strong>Error: A name is required for every customer</strong><br/>";
			exit(1);
		}
		if (isset($_POST['address1']) && !empty($_POST['address1'])) {
			$newCustomerAddress1 = htmlentities($_POST['address1'], ENT_QUOTES, 'UTF-8');
			$customer->setAddress1($newCustomerAddress1);
		} else {
			echo "<strong>Error: A street address is required for every customer</strong><br/>";
			exit(1);
		}
		if (isset($_POST['city']) && !empty($_POST['city'])) {
			$newCustomerCity = htmlentities($_POST['city'], ENT_QUOTES, 'UTF-8');
			$customer->setCity($newCustomerCity);
		} else {
			echo "<strong>Error: A city is required for every customer address</strong><br/>";
			exit(1);
		}
		if (isset($_POST['state']) && !empty($_POST['state'])) {
			$newCustomerState = htmlentities($_POST['state'], ENT_QUOTES, 'UTF-8');
			$customer->setState($newCustomerState);
		} else {
			echo "<strong>Error: A two letter state abbreviation is required for every customer address</strong><br/>";
			exit(1);
		}
		if (isset($_POST['zip']) && !empty($_POST['zip'])) {
			$newCustomerZip = htmlentities($_POST['zip'], ENT_QUOTES, 'UTF-8');
			$customer->setZip($newCustomerZip);
		} else {
			echo "<strong>Error: A zip code is required for every customer address</strong><br/>";
			exit(1);
		}


		//non required fields
		if (isset($_POST['address2']) && !empty($_POST['address2'])) {
			$customer->setAddress2(htmlentities($_POST['address2'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['phone']) && !empty($_POST['phone'])) {
			$customer->setPhone(htmlentities($_POST['phone'], ENT_QUOTES, 'UTF-8'));
		}


		//generate timestamp
		$customer->setLastUpdate(new DateTime('now'));

		//insert into db
		try {
			$entityManager->persist($customer);
			$entityManager->flush();
		} catch (Exception $e) {
			echo "<strong>Error creating customer object: " . $e->getMessage() . "</strong><br/>";
		}

		return $customer->getId();
	}

	public function index() {
		require(dirname(__FILE__)."/../bootstrap.php"); 

		$dql = "SELECT c FROM Customer c ORDER BY c.lastUpdate DESC";

		try {
			$query = $entityManager->createQuery($dql);
			$customers = $query->getArrayResult();
		} catch(Exception $e) {
			echo "<strong>Error querying customer list: " . $e->getMessage() . "</strong><br/>";
		}

		return $customers;
	}

	public function show() {
		//grab Doctrine config
		require(dirname(__FILE__)."/../bootstrap.php"); 

		if(isset($_GET['id'])) {
			$id = $_GET['id'];
		} elseif(isset($_POST['id'])) {
			$id = $_POST['id'];
		} else {
			echo "<strong>No ID specified</strong><br/>";
			exit(1);
		}

		try {
			$customer = $entityManager->find('Customer', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($customer === null) {
		    echo "No customer found.\n";
		    exit(1);
		} else {
			return $customer;
		}
	}

	public function update() {
		require_once(dirname(__FILE__)."/../bootstrap.php");

		if (!isset($_POST['id']) || empty($_POST['id'])) {
			echo "<strong>No customer ID specified</strong><br />";
			exit(1);
		} else {
			$id = $_POST['id'];
		}

		try {
			$customer = $entityManager->find('Customer', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($customer === null) {
		    echo "Customer " . $id . " does not exist.\n";
		    exit(1);
		}

		//Grab form data
		////////////////

		//required fields
		if (isset($_POST['name']) && !empty($_POST['name'])) {
			$newCustomerName = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
			$customer->setName($newCustomerName);
		} else {
			echo "<strong>Error: A name is required for every customer</strong><br/>";
			exit(1);
		}
		if (isset($_POST['address1']) && !empty($_POST['address1'])) {
			$newCustomerAddress1 = htmlentities($_POST['address1'], ENT_QUOTES, 'UTF-8');
			$customer->setAddress1($newCustomerAddress1);
		} else {
			echo "<strong>Error: A street address is required for every customer</strong><br/>";
			exit(1);
		}
		if (isset($_POST['city']) && !empty($_POST['city'])) {
			$newCustomerCity = htmlentities($_POST['city'], ENT_QUOTES, 'UTF-8');
			$customer->setCity($newCustomerCity);
		} else {
			echo "<strong>Error: A city is required for every customer address</strong><br/>";
			exit(1);
		}
		if (isset($_POST['state']) && !empty($_POST['state'])) {
			$newCustomerState = htmlentities($_POST['state'], ENT_QUOTES, 'UTF-8');
			$customer->setState($newCustomerState);
		} else {
			echo "<strong>Error: A two letter state abbreviation is required for every customer address</strong><br/>";
			exit(1);
		}
		if (isset($_POST['zip']) && !empty($_POST['zip'])) {
			$newCustomerZip = htmlentities($_POST['zip'], ENT_QUOTES, 'UTF-8');
			$customer->setZip($newCustomerZip);
		} else {
			echo "<strong>Error: A zip code is required for every customer address</strong><br/>";
			exit(1);
		}


		//non required fields
		if (isset($_POST['address2']) && !empty($_POST['address2'])) {
			$customer->setAddress2(htmlentities($_POST['address2'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['phone']) && !empty($_POST['phone'])) {
			$customer->setPhone(htmlentities($_POST['phone'], ENT_QUOTES, 'UTF-8'));
		}

		//generate timestamp
		$customer->setLastUpdate(new DateTime('now'));

		try {
			$entityManager->flush();
		} catch(Exception $e) {
			echo "<strong>Error saving customer object: " . $e->getMessage() . "</strong><br/>";
		}

		//return the id of updated customer
		return $id;
	}

	public function destroy() {
		require_once(dirname(__FILE__)."/../bootstrap.php");

		if (!isset($_GET['id']) || empty($_GET['id'])) {
			echo "<strong>No customer ID specified</strong><br />";
		} else {
			$id = $_GET['id'];
		}

		try {
			$customer = $entityManager->find('Customer', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($customer === null) {
		    echo "Customer $id does not exist.\n";
		    exit(1);
		}

		try {
			$entityManager->remove($customer);
			$entityManager->flush();
		} catch(Exception $e) {
			echo "<strong>Error deleting customer object: " . $e->getMessage() . "</strong><br/>";
		}

		//return id of destroyed customer
		return $id;
	}
}
?>