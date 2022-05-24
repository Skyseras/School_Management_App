<?php
class Admincontroller extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('Adminmodels');
    }

    public function add()
    {
        $data = [
            'name' => '',
            'email' => '',
            'role' => '',
            'password' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'emailError' => '',
            'roleError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'nameError' => '',
                'emailError' => '',
                'roleError' => '',            
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];


            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter name.';
            } elseif (!preg_match($nameValidation, $data['name'])) {
                $data['nameError'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken.';
                }
            }
       

            //Validate role
            if (empty($data['role'])) {
                $data['roleError'] = 'Please enter your role.';
            }

            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }


            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['roleError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                //Register user from model function
                if ($this->userModel->add($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/admins');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('admins', $data);
    }


    public function edit()
    {
        $data = [
            'id' => '',
            'name' => '',
            'email' => '',
            'role' => '',
            'password' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'emailError' => '',
            'roleError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_POST['id'],
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'nameError' => '',
                'emailError' => '',
                'roleError' => '',            
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];


            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter name.';
            } elseif (!preg_match($nameValidation, $data['name'])) {
                $data['nameError'] = 'Name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken.';
                }
            }
       

            //Validate role
            if (empty($data['role'])) {
                $data['roleError'] = 'Please enter your role.';
            }

            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }


            // Make sure that errors are empty
            if (empty($data['nameError']) && empty($data['roleError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                //Register user from model function
                if ($this->userModel->edit($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/pages/admins');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('admins', $data);
    }



    public function delete()
    {
        $data = ['id' => $_POST['id']];
        if ($this->userModel->delete($data)) {
            //Redirect to the login page
            header('location: ' . URLROOT . '/pages/admins');
        } else {
            die('Something went wrong.');
        }
        $this->view('admins', $data);
    }
}
