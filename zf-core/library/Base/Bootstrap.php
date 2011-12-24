<?php
class Base_Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    /**
     * generate registry
     * @return Zend_Registry
     */
    protected function _initRegistry() {
        $registry = Zend_Registry::getInstance();
        return $registry;
    }


    /**
     * Initialize Doctrine
     * @return Doctrine_Manager
     */
    public function _initDoctrine() {
        // Doctrine class loader 
        require_once('Doctrine/Common/ClassLoader.php');
        $classLoader = new \Doctrine\Common\ClassLoader(
                        'Doctrine',
                        APPLICATION_PATH . '/../library/'
        );
        $classLoader->register();

        // Doctrine configuration
        $config = new \Doctrine\ORM\Configuration();

        // Doctrine cache implementasyonu
        $cache = new \Doctrine\Common\Cache\ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        // Annotations
        $driver = $config->newDefaultAnnotationDriver(
                APPLICATION_PATH . '/Entity'
        );
        $config->setMetadataDriverImpl($driver);

        // set the proxy dir and set some options
        $config->setProxyDir(APPLICATION_PATH . '/models/Proxies');
        $config->setAutoGenerateProxyClasses(true);
        $config->setProxyNamespace('App\Proxies');
        
        // doctrine connection
        $connectionSettings = $this->getOption('doctrine');
        $conn = array(
            'driver' => $connectionSettings['conn']['driver'],
            'user' => $connectionSettings['conn']['user'],
            'password' => $connectionSettings['conn']['pass'],
            'dbname' => $connectionSettings['conn']['dbname'],
            'host' => $connectionSettings['conn']['host']
        );
        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

        // Entity manager register
        $registry = Zend_Registry::getInstance();
        $registry->entitymanager = $entityManager;

        return $entityManager;
    }

}