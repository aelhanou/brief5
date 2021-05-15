<?php



class Matiere
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert($data)
    {

      

       $this->db->query('INSERT INTO matiere (matiere) VALUES(:matiere)');

       $this->db->bind(':matiere', $data['matiere']);
       

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
        $this->db->query('SELECT * FROM matiere');

        $stm = $this->db->resultSet();

        
      return $stm;      
    }
    

    public function Delete($id)
    {

        $dlt = "DELETE FROM matiere WHERE id = '$id'";

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


    public function Edit($id,$matiere)
    {
    
      $edt = "UPDATE matiere SET matiere = :matiere WHERE id = :id";

      $this->db->query($edt);
      $this->db->bind(":matiere",$matiere);
      $this->db->bind(":id",$id);
     if($this->db->execute())
     {
       return true;
     }
     else
     {
       return false;
     }

}

}









?>