<?php


class BookModel
{
    public function findById($id)
    {
        $books = array(
            array(
                'title' => 'Carrie',
                'author' => 'King',
                'price' => 2134.54
            ),
            array(
                'title' => 'Dracula',
                'author' => 'Stoker',
                'price' => 1234.34
            ),
            array(
                'title' => 'Idiot',
                'author' => 'Dostoevskiy',
                'price' => 4121.01
            ),
        );

        if (!isset($books[$id])) {
            throw new NotFoundException("book #{$id} not found");
        }

        return $books[$id];
    }


    public function findAll()
    {
        $books = array(
            array(
                'title' => 'Carrie',
                'author' => 'King',
                'price' => 2134.54
            ),
            array(
                'title' => 'Dracula',
                'author' => 'Stoker',
                'price' => 1234.34
            ),
            array(
                'title' => 'Idiot',
                'author' => 'Dostoevskiy',
                'price' => 4121.01
            ),
        );

        return $books;
    }
}
























