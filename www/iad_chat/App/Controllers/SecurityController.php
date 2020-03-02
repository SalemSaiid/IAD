<?php

namespace App\Controllers;

use App\Repository\UserRepository;
use Config\AppConfig;
use Core\Controller;
use Core\RequestInterface;
use Core\View;

/**
 * Security Controller
 */
class SecurityController extends Controller implements RequestInterface
{
    /**
     * register user
     *
     * @return void
     */
    public function registerAction()
    {
        View::renderTemplate('Security/register.html.twig', []);
    }


    /**
     * login user
     * @throws \Exception
     * @return void
     */
    public function loginAction()
    {
        if($this->getRequestMethod() == self::REQUEST_METHOD_POST){
            try{
                UserRepository::CheckAndLogin(
                    $this->getParam('email'),
                    $this->getParam('password')
                );
                UserRepository::updateIsOnline($this->getProfile()['id'], '1');
                $this->redirect('/');
            }catch (\Exception $e){
                $errorMessage = $e->getMessage();
            }
        }

        View::renderTemplate('Security/login.html.twig', [
            "registerRoute" => AppConfig::APP_BASE_URI . '/register',
            "errorMessage"  => (isset($errorMessage))? $errorMessage:''
        ]);
    }


    /**
     * logout user
     *
     * @return void
     */
    public function logoutAction()
    {
       $this->sessionDestroy();
        UserRepository::updateIsOnline($this->getProfile()['id'], '0');
       $this->redirect('/login');
    }
}
