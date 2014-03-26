<?php
//namespace Controllers;

//use Models\ProductOrder;

// this class is for handling products in the catalog
class ProductOrderController {

	public function create() {
		//grab Doctrine config
		require_once(dirname(__FILE__)."/../bootstrap.php"); 

		//make a new Doctrine object
		try {
			$productOrder = new ProductOrder();
		} catch(Exception $e) {
			echo "<strong>Error creating productOrder object: " . $e->getMessage() . "</strong><br/>";
		}

		//Grab form data
		////////////////

		//required fields
		if (isset($_POST['purchaser']) && !empty($_POST['purchaser'])) {
			//grab id of customer ordering item
			$purchaserId = htmlentities($_POST['purchaser'], ENT_QUOTES, 'UTF-8');
			//grab customer object
			$newPurchaser = $entityManager->find("Customer", $purchaserId);
			$productOrder->setPurchaser($newPurchaser);
		} else {
			echo "<strong>Error: A Purchaser is required for every Order</strong><br/>";
			exit(1);
		}

		if (isset($_POST['productOrdered']) && !empty($_POST['productOrdered'])) {
			$productId = htmlentities($_POST['productOrdered'], ENT_QUOTES, 'UTF-8');
			$productOrdered = $entityManager->find("Product", $productId);
			$productOrder->setProductOrdered($productOrdered);
		} else {
			echo "<strong>Error: A Product is required for every Order</strong><br/>";
			exit(1);
		}

		if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
			$newQuantity = htmlentities($_POST['quantity'], ENT_QUOTES, 'UTF-8');
			$productOrder->setQuantity($newQuantity);
		} else {
			echo "<strong>Error: A quantity is required for every order</strong><br/>";
			exit(1);
		}

		//generate timestamps
		$productOrder->setOrderDate(new DateTime('now'));
		$productOrder->setLastUpdate(new DateTime('now'));

		//insert into db
		try {
			$entityManager->persist($productOrder);
			$entityManager->flush();
		} catch (Exception $e) {
			echo "<strong>Error creating productOrder object: " . $e->getMessage() . "</strong><br/>";
		}

		return $productOrder->getId();
	}

	public function index() {
		require(dirname(__FILE__)."/../bootstrap.php"); 

		$dql = "SELECT o, p, c FROM ProductOrder o JOIN o.productOrdered p JOIN o.purchaser c ORDER BY o.orderDate DESC";

		try {
			$query = $entityManager->createQuery($dql);
			$productOrders = $query->getResult();
		} catch(Exception $e) {
			echo "<strong>Error querying order list: " . $e->getMessage() . "</strong><br/>";
		}

		return $productOrders;
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
			$productOrder = $entityManager->find('ProductOrder', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($productOrder === null) {
		    echo "No order found.\n";
		    exit(1);
		} else {
			return $productOrder;
		}
	}

	public function update() {
		require_once(dirname(__FILE__)."/../bootstrap.php");

		if (!isset($_POST['id']) || empty($_POST['id'])) {
			echo "<strong>No order ID specified</strong><br />";
		} else {
			$id = $_POST['id'];
		}

		try {
			$productOrder = $entityManager->find('ProductOrder', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($productOrder === null) {
		    echo "Order $id does not exist.\n";
		    exit(1);
		}

		//Grab form data
		////////////////

		//required fields
		if (isset($_POST['purchaser']) && !empty($_POST['purchaser'])) {
			//grab id of customer ordering item
			$purchaserId = htmlentities($_POST['purchaser'], ENT_QUOTES, 'UTF-8');
			//grab customer object
			$newPurchaser = $entityManager->find("Customer", $purchaserId);
			$productOrder->setPurchaser($newPurchaser);
		} else {
			echo "<strong>Error: A Purchaser is required for every Order</strong><br/>";
			exit(1);
		}

		if (isset($_POST['productOrdered']) && !empty($_POST['productOrdered'])) {
			//grab id of product ordered
			$productId = htmlentities($_POST['productOrdered'], ENT_QUOTES, 'UTF-8');
			//grab product object
			$productOrdered = $entityManager->find("Product", $productId);
			$productOrder->setProductOrdered($productOrdered);
		} else {
			echo "<strong>Error: A Product is required for every Order</strong><br/>";
			exit(1);
		}

		if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
			$newQuantity = htmlentities($_POST['quantity'], ENT_QUOTES, 'UTF-8');
			$productOrder->setQuantity($newQuantity);
		} else {
			echo "<strong>Error: A quantity is required for every order</strong><br/>";
			exit(1);
		}

		//generate timestamps
		$productOrder->setLastUpdate(new DateTime('now'));

		try {
			$entityManager->flush();
		} catch(Exception $e) {
			echo "<strong>Error saving order object: " . $e->getMessage() . "</strong><br/>";
		}

		//return the id of updated order
		return $id;
	}

	public function destroy() {
		require_once(dirname(__FILE__)."/../bootstrap.php");

		if (!isset($_GET['id']) || empty($_GET['id'])) {
			echo "<strong>No order ID specified</strong><br />";
		} else {
			$id = $_GET['id'];
		}

		try {
			$productOrder = $entityManager->find('ProductOrder', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($productOrder === null) {
		    echo "ProductOrder $id does not exist.\n";
		    exit(1);
		}

		try {
			$entityManager->remove($productOrder);
			$entityManager->flush();
		} catch(Exception $e) {
			echo "<strong>Error deleting order object: " . $e->getMessage() . "</strong><br/>";
		}

		//return id of destroyed productOrder
		return $id;
	}
}
?>