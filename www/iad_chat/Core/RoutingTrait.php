<?php

namespace Core;

use Config\AppConfig;
use Config\Routing;

trait RoutingTrait {

    protected function redirect($route){
        header(sprintf('Location: %s%s', AppConfig::APP_BASE_URL,$route));
    }

    protected function getCurrentRoute(){
        return str_replace(AppConfig::APP_BASE_URI, "", $_SERVER['REQUEST_URI']);
    }

    protected function getCurrentRouteSecurity(){
        return Routing::getRouteSecurity($this->getCurrentRoute());
    }
}