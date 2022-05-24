<?php
class Teachercontroller extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('Teachermodels');
    }

    public function add()
    {
        $data = [
            'name' => '',
            'gender' => '',
            'class' => '',
            'subject' => '',
            'phone' => '',
            'nameError' => '',
            'genderError' => '',
            'classError' => '',
            'subjectError' => '',
            'phoneError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'gender' => trim($_POST['gender']),
                'class' => trim($_POST['class']),
                'subject' => trim($_POST['subject']),
                'phone' => trim($_POST['phone']),
                'nameError' => '',
                'genderError' => '',
                'classError' => '',
                'subjectError' => '',
                'phoneError' => '',
            ];


            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter your name.';
            } elseif (empty($data['gender'])) {
                $data['genderError'] = 'Please enter your gender.';
            } elseif (empty($data['class'])) {
                $data['classError'] = 'Please enter your class.';
            } elseif (empty($data['subject'])) {
                $data['subjectError'] = 'Please enter your subject.';
            } elseif (empty($data['phone'])) {
                $data['phoneError'] = 'Please enter your phone.';
            }

            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['genderError']) && empty($data['classError']) && empty($data['subjectError']) && empty($data['phoneError'])) {

                //Register user from model function
                if ($this->userModel->add($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/teachers');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('teachers', $data);
    }


    public function edit()
    {
        $data = [
            'id' => '',
            'name' => '',
            'gender' => '',
            'class' => '',
            'subject' => '',
            'phone' => '',
            'nameError' => '',
            'genderError' => '',
            'classError' => '',
            'subjectError' => '',
            'phoneError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_POST['id'],
                'name' => trim($_POST['name']),
                'gender' => trim($_POST['gender']),
                'class' => trim($_POST['class']),
                'subject' => trim($_POST['subject']),
                'phone' => trim($_POST['phone']),
                'nameError' => '',
                'genderError' => '',
                'classError' => '',
                'subjectError' => '',
                'phoneError' => '',
            ];


            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter your name.';
            } elseif (empty($data['gender'])) {
                $data['genderError'] = 'Please enter your gender.';
            } elseif (empty($data['class'])) {
                $data['classError'] = 'Please enter your class.';
            } elseif (empty($data['subject'])) {
                $data['subjectError'] = 'Please enter your subject.';
            } elseif (empty($data['phone'])) {
                $data['phoneError'] = 'Please enter your phone.';
            }

            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['genderError']) && empty($data['classError']) && empty($data['subjectError']) && empty($data['phoneError'])) {

                //Register user from model function
                if ($this->userModel->edit($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/teachers');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('teachers', $data);
    }



    public function delete()
    {
        $data = ['id' => $_POST['id']];
        if ($this->userModel->delete($data)) {
            //Redirect to the login page
            header('location: ' . URLROOT . '/pages/teachers');
        } else {
            die('Something went wrong.');
        }
        $this->view('teachers', $data);
    }
}
