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

    public function userName($id){

        $this->db->query('SELECT name FROM users WHERE Id='.$id);

        $this->db->execute();
        return $this->db->single();
    }

    public function getId_matiere($id)
    {
        $this->db->query("SELECT id_matiere FROM users WHERE id = ". $id);
        $this->db->execute();
        return $this->db->single();
    }

    public function insert($id_groupe,$id_salle,$id_user,$date,$heure,$id_matiere)
    {
        $this->db->query("INSERT INTO suivi (date,heure,id_salle,id_groupe,id_user,id_matiere) VALUES(:date,:heure,:id_salle,:id_groupe,:id_user,:id_matiere)");
        $this->db->bind(":date",$date);
        $this->db->bind(":heure",$heure);
        $this->db->bind(":id_salle",$id_salle);
        $this->db->bind(":id_groupe",$id_groupe);
        $this->db->bind(":id_user",$id_user);
        $this->db->bind(":id_matiere",$id_matiere);

        if($this->db->execute())
        {
            return true;
        }
        return false;
    }


    public function checkTime()
    {
        $this->db->query("SELECT date, heure FROM suivi");
        return $this->db->resultSet();

    }
    

    public function getSuivi()
    {
        $this->db->query("SELECT date,id_matiere,heure,suivi.id, salle.salle,groupe.groupe,matiere.matiere FROM suivi INNER JOIN salle ON salle.id = suivi.id_salle INNER JOIN groupe ON groupe.id = suivi.id_groupe INNER JOIN matiere ON matiere.id = suivi.id_matiere");
        return $this->db->resultSet();
    }

    

    public function delete($id)
    {
        $this->db->query("DELETE FROM suivi WHERE id = ". $id);
        if($this->db->execute())
            return true;
        return false;
    }
}











?>