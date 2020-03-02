<?php

namespace App\Repository;

interface UserQueryInterface
{
    const QUERY_FIND_ALL           = "SELECT * From users";
    const QUERY_UPDATE_IS_ONLINE   = "UPDATE `users` SET `is_online` = %s WHERE `users`.`id` = %s;";
    const QUERY_FIND_USER_BY_EMAIL = "SELECT `email` FROM `users` WHERE email = '%s'";
    const QUERY_SAVE_USER          = "INSERT INTO `users` (username, email, password, is_online) VALUES ('%s', '%s', '%s', false)";
}