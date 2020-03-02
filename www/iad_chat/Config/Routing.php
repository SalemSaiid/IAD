<?php

namespace Config;

use Core\Router;

/**
 * Routing
 */
class Routing
{
    /**
     *  Router
     */
    protected $router;

    const routers = [
        [
            '/',
            [
                'controller' => 'HomeController',
                'action' => 'index'
            ],
            'security' => true
        ],
        [
            '/register',
            [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'security' => false
        ],
        [
            '/user/save',
            [
                'controller' => 'UserController',
                'action' => 'save'
            ],
            'security' => false
        ],
        [
            '/login',
            [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'security' => false
        ],
        [
            '/logout',
            [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'security' => false
        ],        [
            '/message/save',
            [
                'controller' => 'MessageController',
                'action' => 'save'
            ],
            'security' => true
        ]

    ];

    public function __construct()
    {
        $this->router = new Router();

        foreach (self::routers as $route){
            $this->router->add($route[0], $route[1]);
        }
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param  $uri
     * @return boolean
     */
    static function getRouteSecurity($uri)
    {
       foreach (self::routers as $route){
           if($route[0] == $uri){
               return $route['security'];
           }
       }

       return true;
    }

}