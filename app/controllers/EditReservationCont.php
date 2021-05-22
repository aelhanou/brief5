<?php


class EditReservationCont extends Controller
{
    public function __construct()
    {
        $this->resEns = $this->model("EditReservationModel");
    }


    public function EditReservation($id = null)
    {
        $this->view("ens/EditReservation",$this->getGroups());
        $this->view("ens/EditReservation",$this->getSalles());
        $this->view("ens/EditReservation",$this->UserName());

        if(isset($id))
        {
            $this->view("ens/EditReservation",$this->getOldReservationValues($id));
            $this->view("ens/EditReservation",$this->getOldReservationValues1($id));
            $this->view("ens/EditReservation",$this->getOldReservationValues2($id));
        }
            
    }



    public function getOldReservationValues($id = null)
    {
        return $this->resEns->getOldReservationGroup($id);
    }
    public function getOldReservationValues1($id = null)
    {
        return $this->resEns->getOldReservationSalle($id);
    }
    public function getOldReservationValues2($id = null)
    {
        return $this->resEns->getOldReservationjoursTemps($id);
    }

    public function getGroups()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        return $this->resEns->getGroups();
    }
    public function getSalles()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        return $this->resEns->getSalles();
    }

    public function UserName()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        return $this->resEns->userName($_SESSION['id']);
    }

    public function update()
    {
        if($this->resEns->EditReservation($_SESSION['id_edit'],$_POST['jour'],$_POST['heure'],$_POST['id_salle'],$_POST['id_groupe']))
        {
            redirect("Enseignents/Enseignent");
        }
    }
    public function cancel()
    {
        redirect("Enseignents/Enseignent");
    }
}
