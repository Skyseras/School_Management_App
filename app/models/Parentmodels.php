<?php
class Parentmodels
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function add($data)
    {
        $this->db->query('INSERT INTO parents (name, gender, job, address, phone) VALUES(:name, :gender, :job, :address, :phone)');

        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':job', $data['job']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':phone', $data['phone']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function get()
    {
        $this->db->query('SELECT * FROM parents order by id DESC');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function edit($data)
    {

        $this->db->query("UPDATE parents SET name=:name,gender=:gender,job=:job,address=:address,phone=:phone  where id =:id");

        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':job', $data['job']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':phone', $data['phone']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function delete($data)
    {
        $this->db->query('DELETE FROM parents WHERE id=:id');

        $this->db->bind(':id', $data['id']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
