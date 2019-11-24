<?php
    class c_Items extends Controller{
        public function index($result = []){
            $this->view('v_items', $result);
        }
        public function getItems(){
            $m_items = $this->model('m_items');
            $result = $m_items->getItems();

            if($result){
                $this->index($result);
            }else{
                $this->index();
            }
        }
    }
