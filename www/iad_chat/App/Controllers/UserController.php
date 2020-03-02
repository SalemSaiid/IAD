<?php

namespace App\Controllers;

use App\Repository\UserRepository;
use Core\Controller;
use Core\RequestInterface;

/**
 * User controller
 */
class UserController extends Controller implements RequestInterface
{
    /**
     * save user
     *
     * @return void
     * @throws
     */
    public function saveAction()
    {
       if($this->getRequestMethod() != self::REQUEST_METHOD_POST){
           throw new \Exception(
               sprintf("The %s method is not supported for this route.", $this->getRequestMethod())
            );
       }

        if (
            !empty(trim($this->getParam('username'))) &&
            !empty(trim($this->getParam('email'))) &&
            !empty($this->getParam('password'))
        ){
            UserRepository::checkAndSaveUser(
                $this->getParam('username'),
                $this->getParam('email'),
                $this->getParam('password')
            );
        }

        $this->redirect('/login');

    }
}
