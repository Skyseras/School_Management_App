<?php
class Parentcontroller extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('Parentmodels');
    }

    public function add()
    {
        $data = [
            'name' => '',
            'gender' => '',
            'job' => '',
            'address' => '',
            'phone' => '',
            'nameError' => '',
            'genderError' => '',
            'jobError' => '',
            'addressError' => '',
            'phoneError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'gender' => trim($_POST['gender']),
                'job' => trim($_POST['job']),
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone']),
                'nameError' => '',
                'genderError' => '',
                'jobError' => '',
                'addressError' => '',
                'phoneError' => '',
            ];


            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter your name.';
            } elseif (empty($data['gender'])) {
                $data['genderError'] = 'Please enter your gender.';
            } elseif (empty($data['job'])) {
                $data['jobError'] = 'Please enter your job.';
            } elseif (empty($data['address'])) {
                $data['addressError'] = 'Please enter your address.';
            } elseif (empty($data['phone'])) {
                $data['phoneError'] = 'Please enter your phone.';
            }

            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['genderError']) && empty($data['jobError']) && empty($data['addressError']) && empty($data['phoneError'])) {

                //Register user from model function
                if ($this->userModel->add($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/parents');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('parents', $data);
    }


    public function edit()
    {
        $data = [
            'id' => '',
            'name' => '',
            'gender' => '',
            'job' => '',
            'address' => '',
            'phone' => '',
            'nameError' => '',
            'genderError' => '',
            'jobError' => '',
            'addressError' => '',
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
                'job' => trim($_POST['job']),
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone']),
                'nameError' => '',
                'genderError' => '',
                'jobError' => '',
                'addressError' => '',
                'phoneError' => '',
            ];


            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter your name.';
            } elseif (empty($data['gender'])) {
                $data['genderError'] = 'Please enter your gender.';
            } elseif (empty($data['job'])) {
                $data['jobError'] = 'Please enter your job.';
            } elseif (empty($data['address'])) {
                $data['addressError'] = 'Please enter your address.';
            } elseif (empty($data['phone'])) {
                $data['phoneError'] = 'Please enter your phone.';
            }

            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['genderError']) && empty($data['jobError']) && empty($data['addressError']) && empty($data['phoneError'])) {

                //Register user from model function
                if ($this->userModel->edit($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/parents');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('parents', $data);
    }



    public function delete()
    {
        $data = ['id' => $_POST['id']];
        if ($this->userModel->delete($data)) {
            //Redirect to the login page
            header('location: ' . URLROOT . '/pages/parents');
        } else {
            die('Something went wrong.');
        }
        $this->view('parents', $data);
    }
}
