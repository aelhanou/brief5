<?php


class  Matieres extends Controller
{

    public function __construct()
    {
        $this->modelMatiere = $this->model("Matiere");
    }

      public function index()
      {
       
        $this->view("matiere/Matieres",$this->getData());
      }


      public function insert()
  {
    if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }

    if (!isset($_POST['submit'])) return;
    if (!empty($_POST['MatiereName'])) {
    $data = [
      'matiere' => $_POST['MatiereName'],
      
    ];

    if ($this->modelMatiere->insert($data)) {
      redirect("Matieres/matiere");
    }
    }
    redirect("Matieres/matiere");
  }

  public function getData()
  {
    if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }

    return $this->modelMatiere->getData();
  }

  public function Delete($id = null)
  {
    if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }

    if ($this->modelMatiere->Delete($id)) {
      redirect("Matieres/matiere");
    }
  }



  public function Save($id = null)
  {
    if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }

    if ($this->modelMatiere->Edit($id, $_POST['matiere_name'])){
      redirect("Matieres/matiere");
    }
  }

}

?> 