<?php


class  Salles extends Controller
{
  

      public function index()
      {
        $data = [
            'title' => 'hi',
        ];

        $this->view("salle/Salles",$data);
      }

} 

















?>