<?php

namespace App\Controllers;

use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Config\AppConfig;
use Core\Controller;
use \Core\View;

/**
 * Home controller
 */
class HomeController extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $users = UserRepository::findAll();
        $messages = MessageRepository::findAll();
        $profile = $this->getProfile();


        View::renderTemplate('Home/index.html.twig', [
            'users' => $users,
            'logoutRoute' => AppConfig::APP_BASE_URI . '/logout',
            'profile' => $profile,
            'messages' => $messages
        ]);
    }
}
