<?php
    class m_Search{
        private $connect;
        private $search_word;

        public function __construct()
        {
            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
            $this->search_word = $_POST['search_word'];
            unset($_POST['search_word']);
        }

        public function getItems(){
            $query = "select * from board where title like '%$this->search_word%'";
            $result = mysqli_query($this->connect, $query);
            $total = mysqli_num_rows($result);
            $rows = array();

            if($result) {
                for ($i = 0; $i < $total; $i++) {
                    array_push($rows, mysqli_fetch_assoc($result));
                }

                return $rows;
            }else{
                return false;
            }
            $this->connect->close();
        }

        public function validate(){
            if($this->search_word == ''){
                return false;
            }else{
                return true;
            }
        }
    }
