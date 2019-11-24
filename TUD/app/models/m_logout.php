<?php
    class m_Logout{
        public function getLogout(){
            session_start();
            unset($_SESSION['id']);
            $result = session_destroy();

            if($result){
                return true;
            }else{
                return false;
            }
        }
    }