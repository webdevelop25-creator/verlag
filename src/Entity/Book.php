<?php

class Book implements EnityInterface
{

    private ?int $id;
    private string $isbn;
    private DateTime $publicationDate;
    private int $pages;
    private string $title;
    private float $price;
    private string $category;
    private bool $hardcover;
    private Author $author;

    public function __construct(string $isbn, string $publicationDate, int $pages, string $title, float $price, string $category, bool $hardcover, int $author_id, ?int $id = null)
    {
        $this->isbn = $isbn;
        $this->id = $id;
        $this->publicationDate = new DateTime($publicationDate);
        $this->pages = $pages;
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
        $this->hardcover = $hardcover;
        $repo = new AuthorRepository();
        $this->author = $repo->findById($author_id);



    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getPublicationDate(): DateTime
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(DateTime $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

    public function setPages(int $pages): void
    {
        $this->pages = $pages;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function isHardcover(): bool
    {
        return $this->hardcover;
    }

    public function setHardcover(bool $hardcover): void
    {
        $this->hardcover = $hardcover;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }


    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

}



