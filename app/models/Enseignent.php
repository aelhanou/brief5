<?php


class   Enseignent
{
    public function __construct()
    {
        $this->db = new Database();
    }



    public function getGroups()
    {
        $this->db->query("SELECT * FROM groupe");
        $stm = $this->db->resultSet();
        return $stm;
    }

    public function getSalles()
    {
        $this->db->query("SELECT * FROM salle");
        $stm = $this->db->resultSet();
        return $stm;
    }
    
}











?>