<?php



class Salle
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert($data)
    {

      

       $this->db->query('INSERT INTO salle(salle, capacite) VALUES(:salle,:capacite)');

       $this->db->bind(':salle', $data['salle']);
       $this->db->bind(':capacite', $data['capacity']);

       if($this->db->execute())
       {
         return true;
       }
       else
       {
         return false;
       }
              
      
    }


    public function getData()
    {
        $this->db->query('SELECT * FROM salle');

        $stm = $this->db->resultSet();

        
      return $stm;      
    }
    

    public function Delete($id)
    {

        $dlt = "DELETE FROM salle WHERE id = '$id'";

        $this->db->query($dlt);
        if($this->db->execute())
        {
          return true;
        }
        else
        {
          return false;
        }
      
    }


    public function Edit($id,$salle,$capacite)
    {
    
      $edt = "UPDATE salle SET salle = :salle, capacite = :capacite WHERE id = :id";

      $this->db->query($edt);
      $this->db->bind(":salle",$salle);
      $this->db->bind(":capacite",$capacite);
      $this->db->bind(":id",$id);
     if($this->db->execute())
     {
       return true;
     }
     else
     {
       return false;
     }
     
    // }

}

}









?>