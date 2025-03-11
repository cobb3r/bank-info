<?php

namespace App\Controllers;

use App\Models\user;
use CodeIgniter\CLI\Console;
use Config\App;
use Config\Email;
use PhpParser\Node\Stmt\Echo_;

class Users extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('index');
    }

    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() == 'POST') {
            $rules = [
                'eaddress' => 'required|min_length[3]|max_length[30]|valid_email|existingAcc[eaddress]',
                'pass' => 'required|min_length[3]|max_length[20]|validateUser[eaddress, pass]',
            ];

            $messages = [
                'eaddress' => [
                    'min_length' => 'Email Must Be 3 Digits or Longer',
                    'max_length' => 'Email Must Be 30 Digits or Less',
                    'valid_email' => 'Invalid Email Address',
                    'is_unique' => 'You Already Have An Account, Please Log In Instead',
                    'existingAcc' => 'You Do Not Have an Account Yet, Please Sign Up'
                ],
                'pass' => [
                    'min_length' => 'Password Must Be 3 Digits or Longer',
                    'max_length' => 'Password Must Be 20 Digits or Less',
                    'validateUser' => 'Password Does not Match'
                ],
            ];

            if (! $this->validate($rules, $messages)) 
            {
                echo view('template/header');
                return view('login', ['validation' => $this->validator,]);
                echo view('template/footer'); //Footer Wont Reload On Form Submission, Include With Main
            } else {
                $model = new user();

                $data = [
                    'eaddress' => $_POST['eaddress'],
                    'pass' => $_POST['pass'],
                ];

                $user = $model->where('eaddress', $data['eaddress'])->first();
                if (!$user) {
                    echo("User Does Not Exist");
                } else {
                    if (! password_verify($data['pass'], $user['pass'])) {
                        echo("Incorrect Password");
                    } else {
                        echo("Signed In");
                        $email = service('email');
                        $email->setTo('tylerannis55@gmail.com');
                        
                        $email->setSubject('Email Test');
                        $email->setMessage('Testing the email class.');

                        $email->send();
                        return redirect()->to('/project-root/public/index');
                    }
                }
            }
        }
        
        echo view('template/header');
        echo view('login');
        echo view('template/footer');
    }

    public function signup()
    {
        helper(['form']);
          
        if ($this->request->getMethod() == 'POST') {
            $rules = [
                'eaddress' => 'required|min_length[3]|max_length[30]|valid_email|is_unique[users.eaddress]|existingAcc[eaddress]',
                'pass' => 'required|min_length[3]|max_length[20]|validateUser[eaddress, pass]',
                'accountName' => 'required|min_length[3]|max_length[30]',
                'accountNumber' => 'required|min_length[8]|max_length[8]',
                'sortCode' => 'required|min_length[6]|max_length[6]',
                'bank' => 'required|min_length[3]|max_length[20]',
            ];

            $messages = [
                'eaddress' => [
                    'min_length' => 'Email Must Be 3 Digits or Longer',
                    'max_length' => 'Email Must Be 30 Digits or Less',
                    'valid_email' => 'Invalid Email Address',
                    'is_unique' => 'You Already Have An Account, Please Log In Instead',
                    'existingAcc' => 'You Do Not Have an Account Yet, Please Sign Up'
                ],
                'pass' => [
                    'min_length' => 'Password Must Be 3 Digits or Longer',
                    'max_length' => 'Password Must Be 20 Digits or Less',
                    'validateUser' => 'Password Does not Match'
                ],
                'accountName' => [
                    'min_length' => 'Account Name Must Be 3 Digits or Longer',
                    'max_length' => 'Account Name Must Be 30 Digits or Less',
                ],
            ];

            if (! $this->validate($rules, $messages)) 
            {
                echo view('template/header');
                return view('signup', ['validation' => $this->validator,]);
                echo view('template/footer'); //Footer Wont Reload On Form Submission, Include With Main
            } else {
                $model = new user();

                $data = [
                    'eaddress' => $_POST['eaddress'],
                    'pass' => $_POST['pass'],
                    'accountName' => $_POST['accountName'],
                    'accountNumber' => $_POST['accountNumber'],
                    'sortCode' => $_POST['sortCode'],
                    'bank' => $_POST['bank'],
                ];

                $model->insert($data);
                return redirect()->to('/project-root/public/index');
            }
        }

        echo view('template/header');
        echo view('signup');
        echo view('template/footer');
    }

    public function edit()
    {
        helper(['form']);

        if ($this->request->getMethod() == 'POST') {
            $rules = [
                'eaddress' => 'required|min_length[3]|max_length[30]|valid_email|existingAcc[eaddress]',
                'pass' => 'required|min_length[3]|max_length[20]|validateUser[eaddress, pass]',
                'accountName' => 'required|min_length[3]|max_length[30]',
                'accountNumber' => 'required|min_length[8]|max_length[8]',
                'sortCode' => 'required|min_length[6]|max_length[6]',
                'bank' => 'required|min_length[3]|max_length[20]',
            ];

            $messages = [
                'eaddress' => [
                    'min_length' => 'Email Must Be 3 Digits or Longer',
                    'max_length' => 'Email Must Be 30 Digits or Less',
                    'valid_email' => 'Invalid Email Address',
                    'is_unique' => 'You Already Have An Account, Please Log In Instead',
                    'existingAcc' => 'You Do Not Have an Account Yet, Please Sign Up'
                ],
                'pass' => [
                    'min_length' => 'Password Must Be 3 Digits or Longer',
                    'max_length' => 'Password Must Be 20 Digits or Less',
                    'validateUser' => 'Password Does not Match'
                ],
                'accountName' => [
                    'min_length' => 'Account Name Must Be 3 Digits or Longer',
                    'max_length' => 'Account Name Must Be 30 Digits or Less',
                ],
            ];

            if (! $this->validate($rules, $messages)) 
            {
                echo view('template/header');
                return view('edit', ['validation' => $this->validator,]);
                echo view('template/footer'); //Footer Wont Reload On Form Submission, Include With Main
            } else {
                $model = new user();

                $data = [
                    'eaddress' => $_POST['eaddress'],
                    'pass' => $_POST['pass'],
                    'accountName' => $_POST['accountName'],
                    'accountNumber' => $_POST['accountNumber'],
                    'sortCode' => $_POST['sortCode'],
                    'bank' => $_POST['bank'],
                ];

                $user = $model->where('eaddress', $data['eaddress'])->first();
                if (!$user) {
                    echo("User Does Not Exist");
                } else { 
                    if (! password_verify($data['pass'], $user['pass'])) {
                        echo("Incorrect Password");
                    } else {
                        $model->update('33', $data); //Issue with the Primary Key
                        return redirect()->to('/project-root/public/index');
                    }
                }
            }
        }
        
        echo view('template/header');
        echo view('edit');
        echo view('template/footer');
    }

    public function delete()
    {
        if ($this->request->getMethod() == 'POST') {
            $rules = [
                'eaddress' => 'required|min_length[3]|max_length[30]|valid_email|existingAcc[eaddress]',
                'pass' => 'required|min_length[3]|max_length[20]|validateUser[eaddress, pass]',
            ];

            $messages = [
                'eaddress' => [
                    'min_length' => 'Email Must Be 3 Digits or Longer',
                    'max_length' => 'Email Must Be 30 Digits or Less',
                    'valid_email' => 'Invalid Email Address',
                    'is_unique' => 'You Already Have An Account, Please Log In Instead',
                    'existingAcc' => 'You Do Not Have an Account Yet, Please Sign Up'
                ],
                'pass' => [
                    'min_length' => 'Password Must Be 3 Digits or Longer',
                    'max_length' => 'Password Must Be 20 Digits or Less',
                    'validateUser' => 'Password Does not Match'
                ],
            ];

            if (! $this->validate($rules, $messages)) 
            {
                echo view('template/header');
                return view('delete', ['validation' => $this->validator,]);
                echo view('template/footer'); //Footer Wont Reload On Form Submission, Include With Main
            } else {
                $model = new user();

                $data = [
                    'eaddress' => $_POST['eaddress'],
                    'pass' => $_POST['pass'],
                ];

                $user = $model->where('eaddress', $data['eaddress'])->first();
                if (!$user) {
                    echo("User Does Not Exist");
                } else {
                    if (! password_verify($data['pass'], $user['pass'])) {
                        echo("Incorrect Password");
                    } else {
                        $model->where('eaddress', $data['eaddress'])->delete();
                        echo("Deleted");
                        return redirect()->to('/project-root/public/index');
                    }
                }
            }
        }

        helper(['form']);
        
        echo view('template/header');
        echo view('delete');
        echo view('template/footer');
    }
}