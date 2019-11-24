<?php
    class m_Signup{
        private $connect;
        private $id;
        private $pw;
        private $email;
        private $addr;
        private $city;
        private $query;
        private $result;

        public function __construct()
        {
            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

            $this->id = $_POST['id'];
            $this->pw = $_POST['pw'];
            $this->email = $_POST['email_text'];
            $this->addr = $_POST['addr_text'];
            $this->city = $_POST['city_text'];

            unset($_POST['id']);
            unset($_POST['pw']);
            unset($_POST['email_text']);
            unset($_POST['addr_text']);
            unset($_POST['city_text']);

            $this->query = "insert into member (id, pw, mail, addr, city) values ('$this->id', '$this->pw', '$this->email', '$this->addr', '$this->city')";
        }

        public function  getSignup(){
            $this->result = $this->connect->query($this->query);

            if($this->query){
                return true;
            }else{
                return false;
            }
            $this->connect->close();
        }
    }