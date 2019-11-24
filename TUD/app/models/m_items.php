<?php
    class m_Items{
        private $connect;
        private $search_word;

        public function __construct()
        {
            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
        }
        public function getItems(){
            $query = "select * from board";
            $result = $this->connect->query($query);
            $total = mysqli_num_rows($result);
            $rows = array();

            if($result){
                for($i=0; $i<$total; $i++){
                    array_push($rows, mysqli_fetch_assoc($result));
                }
                return $rows;
            }else{
                return false;
            }
            $this->connect->close();
        }
    }
