<?php

namespace App\Repository;

interface MessageQueryInterface
{
    const QUERY_FIND_ALL = "SELECT * From messages";
    const QUERY_SAVE_MESSAGE = "INSERT INTO `messages` (`id`, `username`, `message`, `created`) VALUES (NULL, '%s', '%s', '%s')";
}