<?php
class Event extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return $this->db->events->find();
    }

    public function addEvent($data)
    {
        $this->db->events->insertOne($data);
    }

    public function getEvent($data)
    {
        return $this->db->events->findOne($data);
    }

    public function addManyEvent($data)
    {
        $this->db->events->insertMany($data);
    }

    public function deleteEvent($id)
    {
        $this->db->events->deleteOne(['username' => $id]);
    }

    public function updateEvent($slug, $data)
    {
        $this->db->events->updateOne(
            ['slug' => $slug],
            ['$set' => $data]
        );
    }
}
