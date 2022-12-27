<?php 
    class Kegiatan extends DB
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function all()
        {
            return $this->db->kegiatan->find();
        }

        public function addKegiatan($data)
        {
            $this->db->kegiatan->insertOne($data);
        }

        public function getKegiatan($data)
        {
            return $this->db->kegiatan->findOne($data);
        }

        public function addManyKegiatan($data)
        {
            $this->db->kegiatan->insertMany($data);
        }

        public function deleteKegiatan($id)
        {
            $this->db->kegiatan->deleteOne(['username' => $id]);
        }

        public function updateKegiatan($username, $data)
        {
            $this->db->kegiatan->updateOne(
                ['username' => $username],
                ['$set' => $data]
            );
        }
    }
