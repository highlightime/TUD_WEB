<?php
    class m_Reply{
        private $connect;
        private $content;

        public function __construct()
        {
            session_start();
            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

        }

        public function getReply($board_id){
            $query = "select * from reply where board_id = $board_id";

            $result = $this->connect->query($query);
            $total = mysqli_num_rows($result);
            $rows = array();
            if($total != 0){
                for($i=0; $i<$total; $i++){
                    array_push($rows, mysqli_fetch_assoc($result));
                }
                array_push($rows, $board_id);
                return $rows;
            }else{
                array_push($rows, $board_id);
                return $rows;
            }
        }
        public function uploadReply($board_id){
            $id = $_SESSION['id'];
            $this->content = $_POST['content'];

            $query = "insert into reply (board_id, author, content) values ($board_id, '$id', '$this->content')";
            $result = $this->connect->query($query);

            if($result) {
                return true;
            }else{
                return false;
            }
        }

        public function validate(){
            $this->content = $_POST['content'];
            if($this->content == ''){
                return false;
            }else{
                return true;
            }
        }
    }
