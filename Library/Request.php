<?php

class Request
{
    private $get;
    private $post;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return (bool)$_POST;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        if (isset($this->get[$key])) {
            return $this->get[$key];
        }

        return null;
    }

    /**
     * @param $key
     * @return null
     */
    public function post($key)
    {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }

        return null;
    }

}