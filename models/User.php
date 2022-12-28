<?php
require_once 'DB.php';

class User extends DB
{

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        try {
            return $this->db->users->find();
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            return false;
        }
    }

    public function addUser($data)
    {
        try {
            $result = $this->db->users->insertOne($data);
            return $result->getInsertedCount();
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            return false;
        }
    }

    public function getUser($data)
    {
        try {
            return $this->db->users->findOne($data);
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            return false;
        }
    }

    public function getUserWhere($data)
    {
        try {
            return $this->db->users->find($data);
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            return false;
        }
    }

    public function addManyUser($data)
    {
        try {
            $result = $this->db->users->insertMany($data);
            return $result->getInsertedCount();
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            return false;
        }
    }

    public function deleteUser($username)
    {
        try {
            $result = $this->db->users->deleteOne(
                ['username' => $username]
            );
            return $result->getDeletedCount();
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            return false;
        }
    }

    public function updateUser($username, $data)
    {
        try {
            $result = $this->db->users->updateOne(
                ['username' => $username],
                ['$set' => $data]
            );
            return $result->getModifiedCount();
        } catch (\Throwable $e) {
            $_SESSION['error'] = $e->getMessage();
            return false;
        }
    }
}
