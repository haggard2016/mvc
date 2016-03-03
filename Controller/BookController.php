<?php

class BookController
{
    /**
     * @param Request $request
     * @return string
     */
    public function indexAction(Request $request)
    {
        return '<b>This is index action of book controller</b>';
    }
}