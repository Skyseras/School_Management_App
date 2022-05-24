<?php
class Studentcontroller extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('Studentmodels');
    }

    public function add()
    {
        $data = [
            'name' => '',
            'gender' => '',
            'class' => '',
            'parent' => '',
            'address' => '',
            'email' => '',
            'birthday' => '',
            'nameError' => '',
            'genderError' => '',
            'classError' => '',
            'parentError' => '',
            'addressError' => '',
            'emailError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'gender' => trim($_POST['gender']),
                'class' => trim($_POST['class']),
                'parent' => trim($_POST['parent']),
                'address' => trim($_POST['address']),
                'email' => trim($_POST['email']),
                'birthday' => trim($_POST['birthday']),
                'nameError' => '',
                'genderError' => '',
                'classError' => '',
                'parentError' => '',
                'addressError' => '',
                'emailError' => '',
                'birthdayError' => ''
            ];


            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter your name.';
            } elseif (empty($data['gender'])) {
                $data['genderError'] = 'Please enter your gender.';
            } elseif (empty($data['class'])) {
                $data['classError'] = 'Please enter your class.';
            } elseif (empty($data['parent'])) {
                $data['parentError'] = 'Please enter your parent.';
            } elseif (empty($data['address'])) {
                $data['addressError'] = 'Please enter your address.';
            } elseif (empty($data['birthday'])) {
                $data['birthdayError'] = 'Please enter your birthday.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter your email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            }

            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['genderError']) && empty($data['emailError']) && empty($data['classError']) && empty($data['parentError']) && empty($data['addressError']) && empty($data['birthdayError'])) {

                //Register user from model function
                if ($this->userModel->add($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/students');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('students', $data);
    }


    public function edit()
    {
        $data = [
            'id' => '',
            'name' => '',
            'gender' => '',
            'class' => '',
            'parent' => '',
            'address' => '',
            'email' => '',
            'birthday' => '',
            'nameError' => '',
            'genderError' => '',
            'classError' => '',
            'parentError' => '',
            'addressError' => '',
            'emailError' => ''
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
                'parent' => trim($_POST['parent']),
                'address' => trim($_POST['address']),
                'email' => trim($_POST['email']),
                'birthday' => trim($_POST['birthday']),
                'nameError' => '',
                'genderError' => '',
                'classError' => '',
                'parentError' => '',
                'addressError' => '',
                'emailError' => '',
                'birthdayError' => ''
            ];


            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter your name.';
            } elseif (empty($data['gender'])) {
                $data['genderError'] = 'Please enter your gender.';
            } elseif (empty($data['class'])) {
                $data['classError'] = 'Please enter your class.';
            } elseif (empty($data['parent'])) {
                $data['parentError'] = 'Please enter your parent.';
            } elseif (empty($data['address'])) {
                $data['addressError'] = 'Please enter your address.';
            } elseif (empty($data['birthday'])) {
                $data['birthdayError'] = 'Please enter your birthday.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter your email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            }

            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['genderError']) && empty($data['emailError']) && empty($data['classError']) && empty($data['parentError']) && empty($data['addressError']) && empty($data['birthdayError'])) {

                //Register user from model function
                if ($this->userModel->edit($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/students');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('students', $data);
    }



    public function delete()
    {
        $data = ['id' => $_POST['id']];
        if ($this->userModel->delete($data)) {
            //Redirect to the login page
            header('location: ' . URLROOT . '/pages/students');
        } else {
            die('Something went wrong.');
        }
        $this->view('students', $data);
    }
}
