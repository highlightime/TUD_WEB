<?php
    class m_Item{
        private $connect;
        
        public function __construct()
        {
            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
        }
        
        public function getItem($board_id){
            
            
            $query = "select * from board where board_id = $board_id";
            
            $result = $this->connect->query($query);
            
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                
                $return_value = array($row['title'], $row['author'], $row['hit']+1, $row['content']);
                $hit = $row['hit'];
                
                $query = "update board set hit = $hit+1 where board_id = $board_id";
                $this->connect->query($query);
                
                return $return_value;
            }else{
                return false;
            }
        }
        public function delete($board_id){
            $query = "delete from board where board_id = $board_id";
            
            $result = $this->connect->query($query);
            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        }
