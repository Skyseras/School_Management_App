<?php
class Teachermodels
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function add($data)
    {
        $this->db->query('INSERT INTO teachers (name, gender, class, subject, phone) VALUES(:name, :gender, :class, :subject, :phone)');

        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':subject', $data['subject']);
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
        $this->db->query('SELECT * FROM teachers order by id DESC');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function edit($data)
    {

        $this->db->query("UPDATE teachers SET name=:name,gender=:gender,class=:class,subject=:subject,phone=:phone  where id =:id");

        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':phone', $data['phone']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function delete($data)
    {
        $this->db->query('DELETE FROM teachers WHERE id=:id');

        $this->db->bind(':id', $data['id']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
