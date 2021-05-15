<?php

class Enseignents extends Controller
{
    public function __construct()
    {
        $this->ens = $this->model("Enseignent");
    }


    public function Enseignent()
    {
        $this->view("ens/Enseignent",$this->getGroups());
        $this->view("ens/Enseignent",$this->getSalles());
    }



    public function getGroups()
    {
        return $this->ens->getGroups();
    }
    public function getSalles()
    {
        return $this->ens->getSalles();
    }

}













?>