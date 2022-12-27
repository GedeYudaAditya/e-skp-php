<?php
require_once 'DB.php';

class User extends DB
{
    // public $id;
    // public $username;
    // public $password;
    // public $role;
    // public $nama;
    // public $email;
    // public $kegiatan;
    // public $no_hp;
    // public $foto;
    // public $status;
    // public $created_at;
    // public $updated_at;
    // public $deleted_at;

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return $this->db->users->find();
    }

    public function addUser($data)
    {
        $this->db->users->insertOne($data);
    }

    public function getUser($data)
    {
        return $this->db->users->findOne($data);
    }

    public function getUserWhere($data)
    {
        return $this->db->users->find($data);
    }

    public function addManyUser($data)
    {
        $this->db->users->insertMany($data);
    }

    public function deleteUser($username)
    {
        $this->db->users->deleteOne(['username' => $username]);
    }

    public function updateUser($username, $data)
    {
        $this->db->users->updateOne(
            ['username' => $username],
            ['$set' => $data]
        );
    }
}
