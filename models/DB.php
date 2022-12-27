<?php
// require 'vendor/autoload.php';
class DB
{
    protected $db;

    public function __construct()
    {
        $client     = new MongoDB\Client("mongodb://localhost:27017");
        $db         = $client->eskp;
        $this->db   = $db;
    }
}
