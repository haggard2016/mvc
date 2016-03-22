<?php

abstract class Controller
{
    protected function render($viewName, array $args = array())
    {
        extract($args);
        $tplDir = str_replace('Controller', '', get_class($this)); // Index
        $file = VIEW_DIR . $tplDir . DS . $viewName . '.phtml';

        if (!file_exists($file)) {
            throw new Exception("{$file} not found", 404);
        }

        ob_start();
        require $file;
        $content = ob_get_clean();

        ob_start();
        require VIEW_DIR . 'default_layout.phtml';
        return ob_get_clean();
    }

    public static function renderError($code, $message)
    {
        ob_start();
        require VIEW_DIR . 'error.phtml';
        $content = ob_get_clean();

        ob_start();
        require VIEW_DIR . 'default_layout.phtml';
        return ob_get_clean();
    }
}