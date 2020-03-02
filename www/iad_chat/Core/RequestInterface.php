<?php

namespace Core;

interface RequestInterface
{
    const REQUEST_METHOD_POST    = 'POST';
    const REQUEST_METHOD_GET     = 'GET';
    const REQUEST_METHOD_PUT     = 'PUT';
    const REQUEST_METHOD_DELETE  = 'DELETE';
    const REQUEST_METHOD_PATCH   = 'PATCH';
}