<?php

class Enseignents extends Controller
{
    public function __construct()
    {
        $this->ens = $this->model("Enseignent");
        
    }


    public function Enseignent()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        $this->view("ens/Enseignent", $this->getGroups());
        $this->view("ens/Enseignent", $this->getSalles());
        $this->view("ens/Enseignent", $this->UserName());
        $this->view("ens/Enseignent", $this->getSuivi());
    }



    public function getGroups()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        return $this->ens->getGroups();
    }
    public function getSalles()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        return $this->ens->getSalles();
    }


    public function insert()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        if(empty($_POST['id_groupe']) || empty($_POST['id_salle']) || empty($_POST['jour'])|| empty($_POST['heure']))
        {
            redirect("Enseignents/Enseignent");
        }
        foreach ($this->checkTime() as $heure) {
            if ($heure->heure == $_POST['heure'] && $heure->date == $_POST['jour']) {
                $_SESSION['heure'] = 1;
                redirect("Enseignents/Enseignent");
                return;
            }
        }
        if ($this->ens->insert($_POST['id_groupe'], $_POST['id_salle'], $_SESSION['id'], $_POST['jour'], $_POST['heure'], $this->getId_matiere()->id_matiere)) {
            redirect("Enseignents/Enseignent");
        }
    }
    public function checkTime()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        return $this->ens->checkTime();
    }

    public function UserName()
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }
        return $this->ens->userName($_SESSION['id']);
    }

 
    public function getSuivi()
    {
        return $this->ens->getSuivi();
    }

    public function getId_matiere()
    {
        return $this->ens->getId_matiere($_SESSION['id']);
    }


    public function Delete($id = null)
    {
        if (!isset($_SESSION['email'])) {
            redirect("pages/index");
            return;
        }

        if ($this->ens->delete($id)) {
            redirect("Enseignents/Enseignent");
        }
    }



   
}
