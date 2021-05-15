<?php

class Groups extends Controller
{

    public function __construct()
    {
        $this->groupInsert = $this->model('Group');
    }

    public function index()
    {

        if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }
        $d = $this->groupInsert->getData();


        $this->view("group/Groups", $this->groupInsert->getData());







        if (isset($_POST['Cancel'])) {
        }
    }


    public function Insert()
    {

        if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }

        if (!empty($_POST['groupName']) && !empty($_POST['effectif'])) {
            $data = [
                'groupName' => trim($_POST['groupName']),
                'effectif' => trim($_POST['effectif']),
            ];
            if ($this->groupInsert->insert($data)) {
                redirect("Groups/group");
            }
        }
        redirect("Groups/group");
    }


    public function delete($id = null)
    {

        if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }
        if ($this->groupInsert->Delete($id)) {
            redirect("Groups/group");
        }
    }

    public function Save($id = null)
    {
        if(!isset($_SESSION['email']))
        {
          redirect("pages/index");
          return;
        }
        if ($this->groupInsert->Edit($id, $_POST['gr_name'], $_POST['effectif_numb'])); {
            redirect("Groups/group");
        }
    }
}

?>