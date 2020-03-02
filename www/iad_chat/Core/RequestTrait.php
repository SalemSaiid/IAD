<?php

namespace Core;

trait RequestTrait  {
    protected function getRequestMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    protected function getQueryParam($name){
      if(!isset($_GET[$name])){
            return null;
      }

      return htmlspecialchars($_GET[$name]);
    }

    protected function getAllQueryParams(){
        $queryParamsData = [];
        parse_str(
            htmlspecialchars($_SERVER["QUERY_STRING"]),
            $queryParamsData
        );

        return $queryParamsData;
    }

    protected function getParam($name){
        if(!isset($_POST[$name])){
            return null;
        }

        return htmlspecialchars($_POST[$name]);
    }
}