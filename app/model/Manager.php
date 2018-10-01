<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=wow-wishlist;charset=utf8', 'root','');
        return $db;
    }

}
