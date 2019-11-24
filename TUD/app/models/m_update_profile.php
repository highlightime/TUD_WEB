<?php
    class m_Update_profile{
        private $connect;
        private $id;
        private $pw;
        private $email;
        private $addr;
        private $city;
        private $query;
        private $result;

        public function  __construct()
        {
            session_start();
            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

            $this->id = $_SESSION['id'];
            $this->pw = $_POST['update_password'];
            $this->email = $_POST['update_email'];
            $this->addr = $_POST['update_address'];
            $this->city = $_POST['update_city'];

            unset($_POST['update_password']);
            unset($_POST['update_email']);
            unset($_POST['update_address']);
            unset($_POST['update_city']);

            $this->query = "update member set pw = '$this->pw', mail = '$this->email', addr = '$this->addr' where id = '$this->id'";
        }

        public function update(){
            $this->result = $this->connect->query($this->query);

            if($this->result){
                return true;
            }else{
                return false;
            }
        }

        public function validate(){
            if($this->pw == '' || $this->email == '' || $this->addr == '' || $this->city == ''){
                return false;
            }else{
                return true;
            }
        }
    }
