<?php


class  Matieres extends Controller
{
  

      public function index()
      {
        $data = [
            'title' => 'hi',
        ];

        $this->view("matiere/Matieres",$data);
      }

} 