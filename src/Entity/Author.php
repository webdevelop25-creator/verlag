<?php



class Author implements \Entity\EnityInterface
{

    private ?int $id;
    private string $fname;
    private string $lname;
    private DateTime $bday;
    private string $country;

    private array $book;


    public function __construct(string $bday, string $country, string $fname, string $lname, ?int $id = null)
    {
        $this->bday = new DateTime($bday);
        $this->country = $country;
        $this->fname = $fname;
        $this->id = $id;
        $this->lname = $lname;
        $bookrepo = new BookRepository();
        $this->books = $bookrepo->findByAuthor($this);
    }

    public function getBday(): DateTime
    {
        return $this->bday;
    }


    public function setBday(DateTime $bday): void
    {
        $this->bday = $bday;
    }


    public function getCountry(): string
    {
        return $this->country;
    }


    public function setCountry(string $country): void
    {
        $this->country = $country;
    }


    public function getFname(): string
    {
        return $this->fname;
    }


    public function setFname(string $fname): void
    {
        $this->fname = $fname;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLname(): string
    {
        return $this->lname;
    }


    public function setLname(string $lname): void
    {
        $this->lname = $lname;
    }
 public function getBooks(): array
 {
     return $this->books;
 }

 public function setBooks(array $books): void
 {
     $this->books = $books;
 }
}






