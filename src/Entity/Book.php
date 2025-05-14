<?php

class Book
{

    private int $id;
    private string $isbn;
    private Date $publicationDate;
    private int $pages;
    private string $titel;
    private float $price;
    private string $category;
    private bool $hardcover;

    public function __construct(string $isbn, Date $publicationDate, int $pages, string $titel, float $price, string $category, bool $hardcover)
    {
        $this->isbn = $isbn;
        $this->publicationDate = $publicationDate;
        $this->pages = $pages;
        $this->titel = $titel;
        $this->price = $price;
        $this->category = $category;
        $this->handcover = $hardcover;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getPublicationDate(): Date
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(Date $publicationDate): void
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

    public function getTitel(): string
    {
        return $this->titel;
    }

    public function setTitel(string $titel): void
    {
        $this->titel = $titel;
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
}



