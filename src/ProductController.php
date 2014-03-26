<?php
//namespace Controllers;

//use Models\Product;

// this class is for handling products in the catalog
class ProductController {

	public function create() {
		//grab Doctrine config
		require_once(dirname(__FILE__)."/../bootstrap.php"); 

		//make a new Doctrine object
		try {
			$product = new Product();
		} catch(Exception $e) {
			echo "<strong>Error creating product object: " . $e->getMessage() . "</strong><br/>";
		}

		//Grab form data
		////////////////

		//required fields
		if (isset($_POST['name']) && !empty($_POST['name'])) {
			$newProductName = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
			$product->setName($newProductName);
		} else {
			echo "<strong>Error: A name is required for every product</strong><br/>";
			exit(1);
		}
		if (isset($_POST['dollarValue']) && !empty($_POST['dollarValue'])) {
			$newProductPrice = htmlentities($_POST['dollarValue'], ENT_QUOTES, 'UTF-8');
			$product->setDollarValue($newProductPrice);
		} else {
			echo "<strong>Error: A price is required for every product</strong><br/>";
			exit(1);
		}

		//non required fields
		if (isset($_POST['description']) && !empty($_POST['description'])) {
			$product->setDescription(htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['width']) && !empty($_POST['width'])) {
			$product->setWidth(htmlentities($_POST['width'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['length']) && !empty($_POST['length'])) {
			$product->setLength(htmlentities($_POST['length'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['height']) && !empty($_POST['height'])) {
			$product->setHeight(htmlentities($_POST['height'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['weight']) && !empty($_POST['weight'])) {
			$product->setWeight(htmlentities($_POST['weight'], ENT_QUOTES, 'UTF-8'));
		}

		//generate timestamp
		$product->setLastUpdate(new DateTime('now'));

		//insert into db
		try {
			$entityManager->persist($product);
			$entityManager->flush();
		} catch (Exception $e) {
			echo "<strong>Error creating product object: " . $e->getMessage() . "</strong><br/>";
		}

		return $product->getId();
	}

	public function index() {
		require(dirname(__FILE__)."/../bootstrap.php"); 

		$dql = "SELECT p FROM Product p ORDER BY p.lastUpdate DESC";

		try {
			$query = $entityManager->createQuery($dql);
			$products = $query->getArrayResult();
		} catch(Exception $e) {
			echo "<strong>Error querying product list: " . $e->getMessage() . "</strong><br/>";
		}

		return $products;
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
			$product = $entityManager->find('Product', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($product === null) {
		    echo "No product found.\n";
		    exit(1);
		} else {
			return $product;
		}
	}

	public function update() {
		require_once(dirname(__FILE__)."/../bootstrap.php");

		if (!isset($_POST['id']) || empty($_POST['id'])) {
			echo "<strong>No product ID specified</strong><br />";
		} else {
			$id = $_POST['id'];
		}

		try {
			$product = $entityManager->find('Product', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($product === null) {
		    echo "Product $id does not exist.\n";
		    exit(1);
		}

		//Grab form data
		////////////////

		//required fields
		if (isset($_POST['name']) && !empty($_POST['name'])) {
			$newProductName = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
			$product->setName($newProductName);
		} else {
			echo "<strong>Error: A name is required for every product</strong><br/>";
			exit(1);
		}
		if (isset($_POST['dollarValue']) && !empty($_POST['dollarValue'])) {
			$newProductPrice = htmlentities($_POST['dollarValue'], ENT_QUOTES, 'UTF-8');
			$product->setDollarValue($newProductPrice);
		} else {
			echo "<strong>Error: A price is required for every product</strong><br/>";
			exit(1);
		}

		//non required fields
		if (isset($_POST['description']) && !empty($_POST['description'])) {
			$product->setDescription(htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['width']) && !empty($_POST['width'])) {
			$product->setWidth(htmlentities($_POST['width'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['length']) && !empty($_POST['length'])) {
			$product->setLength(htmlentities($_POST['length'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['height']) && !empty($_POST['height'])) {
			$product->setHeight(htmlentities($_POST['height'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($_POST['weight']) && !empty($_POST['weight'])) {
			$product->setWeight(htmlentities($_POST['weight'], ENT_QUOTES, 'UTF-8'));
		}

		//generate timestamp
		$product->setLastUpdate(new DateTime('now'));

		try {
			$entityManager->flush();
		} catch(Exception $e) {
			echo "<strong>Error saving product object: " . $e->getMessage() . "</strong><br/>";
		}

		//return the id of updated product
		return $id;
	}

	public function destroy() {
		require_once(dirname(__FILE__)."/../bootstrap.php");

		if (!isset($_GET['id']) || empty($_GET['id'])) {
			echo "<strong>No product ID specified</strong><br />";
		} else {
			$id = $_GET['id'];
		}

		try {
			$product = $entityManager->find('Product', $id);
		} catch (Exception $e) {
			echo "<strong>Error finding entity: " . $e->getMessage() . "</strong><br/>";
		}

		if ($product === null) {
		    echo "Product $id does not exist.\n";
		    exit(1);
		}

		try {
			$entityManager->remove($product);
			$entityManager->flush();
		} catch(Exception $e) {
			echo "<strong>Error deleting product object: " . $e->getMessage() . "</strong><br/>";
		}

		//return id of destroyed product
		return $id;
	}
}
?>