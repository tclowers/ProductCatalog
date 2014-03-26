<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM
$isDevMode = true;
$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/entities"), $isDevMode);

// database configuration parameters

//for MySQL
$conn = array(
	'driver' => 'pdo_mysql',
	'host' => '127.0.0.1',
	'dbname' => 'catalog2',
	'user' => 'doctrine',
	'password' => 'dpass'
	);

//for sqlite:
/*$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);*/

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

?>