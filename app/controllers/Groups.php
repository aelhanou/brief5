<?php

    class Groups extends Controller
    {
        public function __construct()
        {
        }

        public function index()
        {
            $data = [
                'title' => 'welcome',
            ];
            $this->view("group/Groups",$data);
        }

    }




?>