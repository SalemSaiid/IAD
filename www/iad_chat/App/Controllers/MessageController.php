<?php

namespace App\Controllers;

use App\Repository\MessageRepository;
use Core\Controller;

/**
 * Home controller
 */
class MessageController extends Controller
{
    /**
     * Send message
     *
     * @return string
     */
    public function saveAction()
    {
        $profile = $this->getProfile();
        $response = MessageRepository::saveMessage($this->getParam('message'), $profile);
        echo json_encode($response);
    }
}
