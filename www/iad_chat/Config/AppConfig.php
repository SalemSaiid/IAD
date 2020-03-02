<?php

namespace Config;

/**
 * Application configuration
 */
class AppConfig
{
    /************************* APP Config *****************************/
    /**
     * APP Base URL
     */
    const APP_BASE_URL = 'http://localhost:8001/iad_chat/public/index.php';

    /**
     * APP Base URI
     */
    const APP_BASE_URI = '/iad_chat/public/index.php';

    /**
     * Show or hide error messages on screen (404.html, 500.html ...)
     */
    const APP_SHOW_ERRORS = true;


    /************************* APP DataBase Config ********************/
    /**
     * Database host
     */
    const DB_HOST = 'db';

    /**
     * Database name
     */
    const DB_NAME = 'iad_chat_db';

    /**
     * Database user
     */
    const DB_USER = 'user';

    /**
     * Database password
     */
    const DB_PASSWORD = 'test';
}
