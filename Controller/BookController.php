<?php

class BookController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function indexAction(Request $request)
    {
        $model = new BookModel();
        $books = $model->findAll();

        $args = compact('books');

        return $this->render('index', $args);
    }


    public function showAction(Request $request)
    {
        $id = $request->get('id');
        $book = (new BookModel())->findById($id);

        $args = compact('book');
        return $this->render('show', $args);
    }


}






















