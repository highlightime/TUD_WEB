<?php
    class m_Login{
        private $connect;
        private $id;
        private $pw;

        public function __construct()
        {
            session_start();
            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

            $this->id = $_POST['id'];
            $this->pw = $_POST['pw'];
            unset($_POST['id']);
            unset($_POST['pw']);
        }

        public function getLogin(){
            $query = "select * from member where id='$this->id'";
            $result = $this->connect->query($query);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);

                if($row['pw'] == $this->pw){
                    $_SESSION['id'] = $this->id;

                    if(isset($_SESSION['id'])){
                        return true;
                    }else{
                        return false; #session fail
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    }