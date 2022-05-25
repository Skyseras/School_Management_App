<?php
class Studentmodels
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function add($data)
    {
        $this->db->query('INSERT INTO students (name, gender, class, parent, address, email, birthday) VALUES(:name, :gender, :class, :parent, :address, :email, :birthday)');

        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':parent', $data['parent']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':birthday', $data['birthday']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function get()
    {
        $this->db->query('SELECT * FROM students order by id DESC');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getsearch($word)
    {
        $this->db->query("SELECT * FROM students WHERE name LIKE '%$word%' OR gender LIKE '%$word%' OR class LIKE '%$word%' OR parent LIKE '%$word%' OR address LIKE '%$word%' OR email LIKE '%$word%' OR birthday LIKE '%$word%' order by id DESC");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getStudentsMale()
    {
        $this->db->query('SELECT * FROM students WHERE gender="Male"');
        $this->db->execute();
        return $this->db->resultSet();
    }
    public function getStudentsFemale()
    {
        $this->db->query('SELECT * FROM students WHERE gender="Female"');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getStudentsByClass()
    {
        $this->db->query('SELECT count(*) AS students_count, class AS class_name FROM students GROUP by class;');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function edit($data)
    {

        $this->db->query("UPDATE students SET name=:name,gender=:gender,class=:class,parent=:parent,address=:address,email=:email,birthday=:birthday  where id =:id");

        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':class', $data['class']);
        $this->db->bind(':parent', $data['parent']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':birthday', $data['birthday']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function delete($data)
    {
        $this->db->query('DELETE FROM students WHERE id=:id');

        $this->db->bind(':id', $data['id']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
