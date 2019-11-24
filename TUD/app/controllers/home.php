<?php
    class Home extends Controller{

        public function index($name = ''){ #home/index : model을 부르는, but it's default value
            $this->view('index', ['name' => $name ]); #directory path
        }
    }
