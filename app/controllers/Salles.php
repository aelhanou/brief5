<?php


class  Salles extends Controller
{

  public function __construct()
  {
    $this->modelSalle = $this->model("Salle");
  }

  public function index()
  {
    $this->view("salle/Salles", $this->getData());
  }




  public function insert()
  {
    if (!isset($_SESSION['email'])) {
      redirect("pages/index");
      return;
    }

    if (!isset($_POST['submit'])) return;

    if (!empty($_POST['salleName'])) {
      $data = [
        'salle' => $_POST['salleName'],
        'capacity' => $_POST['capacity']
      ];

      if ($this->modelSalle->insert($data)) {
        redirect("salles/salle");
      }
    }
    redirect("salles/salle");
  }

  public function getData()
  {
    if (!isset($_SESSION['email'])) {
      redirect("pages/index");
      return;
    }

    return $this->modelSalle->getData();
  }


  public function Delete($id = null)
  {
    if (!isset($_SESSION['email'])) {
      redirect("pages/index");
      return;
    }

    if ($this->modelSalle->Delete($id)) {
      redirect("salles/salle");
    }
  }

  public function Save($id = null)
  {
    if (!isset($_SESSION['email'])) {
      redirect("pages/index");
      return;
    }

    if ($this->modelSalle->Edit($id, $_POST['salle_name'], $_POST['capacity_numb'])) {
      redirect("salles/salle");
    }
  }
}
