<?php

namespace Core;

use Config\AppConfig;

/**
 * Base Repository
 */
abstract class Repository
{

    /**
     * Get the Mysqli database connection
     *
     * @return mixed
     */
    protected static function GetDbConnection()
    {
        static $dbConnection = null;

        if ($dbConnection === null) {
            $dbConnection = mysqli_connect(
                AppConfig::DB_HOST,
                AppConfig::DB_USER,
                AppConfig::DB_PASSWORD,
                AppConfig::DB_NAME
            );
        }

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        return $dbConnection;
    }
}
