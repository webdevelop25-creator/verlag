<?php

class BookRepository extends AbstractRepository
{

    public function findAll(): array
    {

        $sql = "SELECT * FROM book";
        $result = $this->query($sql);
        $return = [];

        foreach ($result as $item) {
            $return[] = new Book(
                $item['id'],
                $item['isbn'],
                $item['publication_date'],
                $item['pages'],
                $item['title'],
                $item['price'],
                $item['category'],
                $item['hardcover'],
                $item['author_id']);

        }
        return $return;

//string $isbn, string $publicationDate, int $pages, string $titel, float $price, string $category, bool $hardcover, int $author_id, ?int $id = null)
    }


    public function findById(int $id)
    {
        $data = [':id' => $id];
        $sql = "SELECT * FROM book WHERE id = :id";
        $item = $this->query($sql, $data)[0];

        return new Book(
            $item['category'],
            $item['hardcover'],
            $item['isbn'],
            $item['pages'],
            $item['price'],
            $item['publication_date'],
            $item['title'],
            $item['author_id'],
            $item['id']);

    }

    public function create(Book $book): Book
    {
        $data = [':isbn' => $book->getIsbn(),
            ':publication_date' => $book->getPublicationDate()->format('Y-m-d'),
            'pages' => $book->getPages(), 'title' => $book->getTitle(),
            'price' => $book->getPrice(), 'category' => $book->getCategory(),
            'hardcover' => $book->isHardcover(),
            'author_id' => $book->getAuthor()->getId()];


        $sql = "INSERT INTO book (
                  isbn, 
                  publication_date,
                  pages,
                  title, price,
                  category, hardcover,
                  author_id) 
            VALUES (
                    :isbn, 
                    :publication_date,
                    :pages,
                    :title;
                    :price,
                    :category,
                    :hardcover,
                    :author_id)";
        $result = $this->query($sql, $data);
        return $this->findById($result['id']);
    }


    public function update(Book $book): Book
    {
        $data = [':isbn' => $book->getIsbn(),
            ':publication_date' => $book->getPublicationDate()->format('Y-m-d'),
            'pages' => $book->getPages(), 'title' => $book->getTitle(),
            'price' => $book->getPrice(), 'category' => $book->getCategory(),
            'hardcover' => $book->isHardcover(),
            'author_id' => $book->getAuthor()->getId()
        'id'=>$book->getId();

        $sql = "UPDATE book SET publication_date = 
                isbn = :isbn,
                publication_date = :publication_date,,
                pages = :pages,
                title = :title,
                price = :price,
                category = :category,
                hardcover = :hardcover,
                author_id = :author_id
                WHERE id = :id";
    $this->query($sql, $data);
        return $this->findById($book->getId());
}


    public function remove(Book $book): bool
    {
        $id = $book->getID();
        $dbcon = $this->Dbcon();
        $sql = 'SELECT * FROM book WHERE id = :id';
        $stm = $dbcon->prepare($sql);
        $stm->bindParam(':id', $id);
        return $stm->execute();

    }

    /**
     * @param Author $author
     * @return array|null
     */
    public function findByAuthor(Author $author): array
    {
        $id = $author->getId();
        $dbcon = $this->Dbcon();
        $sql = 'SELECT * FROM book WHERE author_id = :author_id';
        $stm = $dbcon->prepare($sql);
        $stm->bindParam(':author_id', $author_id);
        $stm->execute();

        $data = $stm->fetchALL(PDO::FETCH_ASSOC);
        $return = [];
        foreach ($data as $item) {
            return [] = $item['id'];
        }
        return $return;


    }
}

include '../Entity/Author.php';
include '../Entity/Book.php';
include '../Repository/BookRepository.php';
$repo = new BookRepository();
$authors = $repo->findAll();

//test getbyAuthor
$author = $authrepo->findById(2);
$books = $repo->findByAuthor($author);
//var_dump($books);
var_dump($books[0]->getTitle());