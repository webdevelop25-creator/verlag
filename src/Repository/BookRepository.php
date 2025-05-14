<?php

namespace Repository;

class BookRepository
{
    public function DbCon(): PDO
    {
        return new PDO("mysql:host=localhost;dbname=verlag", "root", "");
    }

}