<?php


class BookModel
{
    public function findById($id)
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare('SELECT * FROM book WHERE id = :book_id');
        $params = array(
            'book_id' => $id
        );
        $sth->execute($params);

        $book = $sth->fetch(PDO::FETCH_ASSOC);

        if (!$book) {
            throw new NotFoundException("book #{$id} not found");
        }

        return $book;
    }


    public function findAll()
    {
        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT * FROM book WHERE status = 1 ORDER BY price');
        $sth->execute();

        $data = $sth->fetchAll(PDO::FETCH_ASSOC);

        if (!$data) {
            throw new NotFoundException('Books not found');
        }

        return $data;
    }

    public function findByIdArray(array $ids)
    {
        if (!$ids) {
            return array();
        }

        $params = array();

        foreach ($ids as $v) {
            $params[] = '?';
        }

        $params = implode(',', $params);

        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->prepare("SELECT * FROM book WHERE status = 1 AND id IN ({$params}) ORDER BY price");
        $sth->execute($ids);

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}
























