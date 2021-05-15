<?php



class Group
{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function insert($data)
    {

      

       $this->db->query('INSERT INTO groupe(groupe, effectif) VALUES(:groupe,:effectif)');

       $this->db->bind(':groupe', $data['groupName']);
       $this->db->bind(':effectif', $data['effectif']);

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
        $this->db->query('SELECT * FROM groupe');

        $stm = $this->db->resultSet();

        
      return $stm;      
    }
    

    public function Delete($id)
    {
        $dlt = "DELETE FROM groupe WHERE id = '$id'";

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


    public function Edit($id,$groupe,$effectif)
    {
    
      $edt = "UPDATE groupe SET groupe = :groupe, effectif = :effectif WHERE id = :id";

      $this->db->query($edt);
      $this->db->bind(":groupe",$groupe);
      $this->db->bind(":effectif",$effectif);
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