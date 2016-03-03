<?php

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function indexAction(Request $request)
    {
        $args = array(
            'var1' => 256,
            'var2' => 'hello'
        );
        
        return $this->render('index', $args);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function contactAction(Request $request)
    {
        return '<b>This is contact action of index controller</b>';
    }

}