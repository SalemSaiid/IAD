<?php

namespace App\Repository;

use App\Exception\EmailDoesNotExistException;
use App\Exception\IncorrectPasswordException;
use App\Exception\RequiredFieldsException;
use App\Models\User;
use Core\Repository;

/**
 * User Repository
 */
class UserRepository extends Repository implements UserQueryInterface
{
    /**
     * Get all the users as an associative user array
     *
     * @return array
     */
    public static function findAll()
    {
        $data = [];
        $conn = static::GetDbConnection();
        $result = mysqli_query($conn, self::QUERY_FIND_ALL);

        while ($value = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($data, (new User())
                ->setId($value['id'])
                ->setUsername($value['username'])
                ->setEmail($value['email'])
                ->setIsOnline((boolean)$value['is_online'])
            );
        }

        return $data;
    }

    /**
     * Get all the users as an associative user array
     */
    public static function updateIsOnline($id, $isOnline)
    {
         $conn = static::GetDbConnection();
         mysqli_query($conn, sprintf(self::QUERY_UPDATE_IS_ONLINE, $isOnline, $id));
    }

    /**
     * check And Save User
     *
     * @throws \Exception
     */
    public static function checkAndSaveUser($username, $email, $password)
    {

        // Escape special characters.
        $username = mysqli_real_escape_string(static::GetDbConnection(), htmlspecialchars($username));
        $email = mysqli_real_escape_string(static::GetDbConnection(), htmlspecialchars($email));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid email address", 400);
        }

        // CHECK IF EMAIL IS ALREADY REGISTERED
        $checkEmail = mysqli_query(
            static::GetDbConnection(),
            sprintf(self::QUERY_FIND_USER_BY_EMAIL, $email)
        );

        if (mysqli_num_rows($checkEmail) > 0) {
            throw new \Exception("This Email Address is already registered. Please Try another.", 400);
        }

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertUser = mysqli_query(
            static::GetDbConnection(),
            sprintf(self::QUERY_SAVE_USER, $username, $email, $hashPassword)
        );

        if (!$insertUser) {
            throw new \Exception("Oops! something wrong.");
        }
    }

    /**
     * check And login
     *
     * @throws \Exception
     */
    public static function checkAndLogin($email, $password)
    {
        if (empty(trim($email)) || empty(trim($password))) {
           throw new RequiredFieldsException();
        }

        $email = mysqli_real_escape_string(static::GetDbConnection(), htmlspecialchars(trim($email)));
        $query = mysqli_query(static::GetDbConnection(), "SELECT * FROM `users` WHERE email = '$email'");

        if(mysqli_num_rows($query) <= 0) {
          throw new EmailDoesNotExistException();
        }

        $row = mysqli_fetch_assoc($query);

        // VERIFY PASSWORD
        $checkPassword = password_verify($password, $row['password']);
        if (!$checkPassword) {
            throw new IncorrectPasswordException();
        }

        session_start();
        session_regenerate_id(true);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_username'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
    }

}