<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }



    

    public function register(){
      // Check for POST
     
      if(isset($_SESSION['email']))
      {
        redirect("pages/index");
        return;
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'matiere' => trim($_POST['matiere']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        } else {
          // Check email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Pleae enter name';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Pleae enter password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Pleae confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // Validated
          
          // Hash Password
          $data['password'] = $data['password'];

          // echo $_POST['matiere'];
          // Register User
          if($this->userModel->register($data)){
              redirect('users/login');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
          $this->view('users/register', $this->matiere());
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      }
      
    }

    public function login(){
      // Check for POST
      if(isset($_SESSION['email']))
      {
        redirect("pages/index");
        return;
      }
      
      $this->userModel->login();
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
       

        if(isset($_POST['submit']))
        {
          
          if(empty($data['email'])){
            $data['email_err'] = 'Pleae enter email';
            
          }
  
          // Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
            $this->view('users/login', $data);
          }
          // echo password_hash($_POST['password'], PASSWORD_DEFAULT);
          if($this->userModel->checkeUsers($_POST['email'],$_POST['password']))
          {
            $_SESSION['role'] = $this->userModel->role()->role;
            $_SESSION['email'] = $this->userModel->login()[0]->email;
            if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
              redirect("Groups/group");
            else
              redirect("Enseignents/Enseignent");
          }
          else
          {
            $data = [
              'email' => '',
              'password' => '',
            ];
            $this->view('users/login', $data);
            
          }
        }
        

      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }

      
      
   
    }

    public function matiere()
    {
      return $this->userModel->matiere();
    }
    public function logout(){
       session_destroy();
       redirect("users/login");
    }
  }