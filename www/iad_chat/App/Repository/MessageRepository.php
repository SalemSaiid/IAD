<?php

namespace App\Repository;

use App\Models\Message;
use Core\Repository;

/**
 * User Repository
 */
class MessageRepository extends Repository implements MessageQueryInterface
{
    /**
     * Get all the message
     *
     * @return array
     */
    public static function findAll()
    {
        $data = [];
        $conn = static::GetDbConnection();
        $result = mysqli_query($conn, self::QUERY_FIND_ALL);

        while ($value = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($data, (new Message())
                ->setId($value['id'])
                ->setUsername($value['username'])
                ->setMessage($value['message'])
                ->setCreated(new \DateTime($value['created']))
            );
        }

        return $data;
    }

    /**
     * Get all the message
     *
     * @param $message
     * @param $profile
     *
     * @return array
     */
    public static function saveMessage($message, $profile)
    {
        $now = (new \DateTime('now'))->format('Y-m-d H:i:s');

        mysqli_query(
            static::GetDbConnection(),
            sprintf(self::QUERY_SAVE_MESSAGE, $profile['username'], $message, $now)
        );

       return [
            'username' => $profile['username'],
            'message' => $message,
            'created' => $now
        ];
    }
}