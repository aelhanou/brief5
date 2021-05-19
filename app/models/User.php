<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO users (name, email, password, role,id_matiere) VALUES(:name, :email, :password, :role,:matiere)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':matiere', $data['matiere']);
      $this->db->bind(':role', 0);
      // $_SESSION['id_matiere'] = $data['matiere'];
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }




    public function login(){

        $this->db->query('SELECT id,email,password FROM users');
        $this->db->execute();
        return $this->db->resultSet();

    }
    public function role(){

      $this->db->query('SELECT role FROM users WHERE id='.$_SESSION['id']);
      $this->db->execute();
      return $this->db->single();

  }

    public function checkeUsers($email,$password)
    {

        foreach($this->db->resultSet() as $result)
        {
           if($result->email == $email && $result->password == $password)
           {
              $_SESSION['id'] = $result->id;
              return 1;
           }
        }

        return 0;
    }


    public function matiere()
    {
     
      $this->db->query("SELECT * FROM matiere");
      $stm = $this->db->resultSet();
      
      return $stm;
    }
  }