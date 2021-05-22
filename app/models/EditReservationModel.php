<?php


class EditReservationModel
{
    public function __construct()
    {
        $this->db = new Database();
    }



    public function EditReservation($id, $date, $heure, $id_salle, $id_groupe)
    {
        $query = "UPDATE suivi SET date=:date,heure=:heure,id_salle=:id_salle,id_groupe=:id_groupe WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(":date", $date);
        $this->db->bind(":heure", $heure);
        $this->db->bind(":id_salle", $id_salle);
        $this->db->bind(":id_groupe", $id_groupe);
        $this->db->bind(":id", $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function getOldReservationjoursTemps($id)
    {
        $this->db->query("SELECT date,heure FROM suivi WHERE suivi.id=" . $id);
        return $this->db->single();
    }
    public function getOldReservationSalle($id)
    {
        $this->db->query("SELECT salle.salle FROM suivi INNER JOIN salle ON salle.id = suivi.id_salle WHERE suivi.id=" . $id);
        return $this->db->single();
    }
    public function getOldReservationGroup($id)
    {
        $this->db->query("SELECT groupe.groupe FROM suivi INNER JOIN groupe ON groupe.id = suivi.id_groupe WHERE suivi.id=" . $id);
        return $this->db->single();
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

    public function userName($id)
    {

        $this->db->query('SELECT name FROM users WHERE Id=' . $id);

        $this->db->execute();
        return $this->db->single();
    }
}
