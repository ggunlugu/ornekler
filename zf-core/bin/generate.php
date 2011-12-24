<?php
set_include_path('../library/');
require 'Doctrine/ORM/Tools/Setup.php';
ini_set("display_errors", "On");

// this is not necessary if you use Doctrine2 with PEAR
//$libPath = __DIR__ . '/../lib/doctrine2';
use Doctrine\ORM\Tools\EntityGenerator;

// autoloaders
require_once 'Doctrine/Common/ClassLoader.php';

//$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', $libPath);	// custom path
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine');	// with PEAR
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();

// config
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver('../application/Entity'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');

$connectionParams = array(
  'dbname' => 'test',
  'user' => 'root',
  'password' => 'root',
  'host' => '127.0.0.1',
  'driver' => 'pdo_mysql',
);

$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);

// custom datatypes (not mapped for reverse engineering)
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

// fetch metadata
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
  $em->getConnection()->getSchemaManager()
);

$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($em);	// we must set the EntityManager

$classes = $driver->getAllClassNames();
$metadata = array();
foreach ($classes as $class) {
  //any unsupported table/schema could be handled here to exclude some classes
  if (true) {
    $metadata[] = $cmf->getMetadataFor($class);
  }
}

$generator = new EntityGenerator();
$generator->setUpdateEntityIfExists(true);
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->generate($metadata, '../application/Entity');

print 'Done!';