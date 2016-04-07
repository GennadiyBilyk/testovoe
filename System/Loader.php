<?php
/**
 * Created by PhpStorm.
 * User: bilyk
 * Date: 07.04.2016
 *
 */



namespace System;



class Loader
{
    private $_routes;

    public function __construct(array $params = array())
    {

        spl_autoload_register(array($this, 'load_class'));
        $this->_routes = $params;

    }

    public function load_class($class)
    {

        $file =   str_replace("\\", '/', $class) . '.php';

        if(is_file($file)){
            require_once $file;
        } else {
            $n_space = '\\' . substr($class, 0, strrpos($class, "\\"));
            if(array_key_exists($n_space, $this->_routes)) {
                $file = $this->_routes[$n_space] . substr($class, strrpos($class, "\\") + 1) . '.php';
                if(is_file($file)){
                    require_once $file;
                } else {
                    throw new \Exception('Class "' . $class . '" does not exists.');
                }
            } else {
                throw new \Exception('There is no way for "' . $n_space);
            }
        }

    }
}