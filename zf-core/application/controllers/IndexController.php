<?php

class IndexController extends Zend_Controller_Action {

    public function init() {
        $registry = Zend_Registry::getInstance();
        $this->_em = $registry->entitymanager;
    }

    public function indexAction() {
        try {
            
            $userEntity = new Entity_User;
            $userEntity->setUsername('Mustafa');
            $userEntity->setUsermail('mstfleri@gmail.com');
            $userEntity->setPassword(md5('pass'));
            $userEntity->setRegisterdate(time());
            $userEntity->setStatus('active');
            $userEntity->setUsertype('admin');
            $userEntity->setUseravatar('a.png');
            $this->_em->persist($userEntity);
            $this->_em->flush();

        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}