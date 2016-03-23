<?php

return  array(
    // some default routes
    'default' => new Route('/', 'Index', 'index'),
    'index_php' => new Route('/index.php', 'Index', 'index'),

    // others
    'books_list' => new Route('/books', 'Book', 'index'),
    'book_page' => new Route('/book-{id}\.html', 'Book', 'show', array('id' => '[0-9]+') ),
    'contact_us' => new Route('/contact-us', 'Index', 'contact'),
    'cart_add' => new Route('/add/{id}', 'Cart', 'add', array('id' => '[0-9]+') ),
    'cart_list' => new Route('/cart', 'Cart', 'index'),
);
