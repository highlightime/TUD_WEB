<?php
    class Controller{
        public function model($model){ #model name want to call
            require_once '../app/models/' . $model . '.php';
            return new $model();
        }
        public function view($view , $data = []){ #view name want to call
            require_once '../app/views/' . $view . '.php';
        }
    }
