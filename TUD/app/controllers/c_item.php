<?php
    class c_Item extends Controller{

        public function index($board_id, $title, $author, $hit, $content){
            #title, author, hit, content
            #content, date
            $this->view('v_item',
                ['board_id' => $board_id,
                    'title' => $title,
                    'author' => $author,
                    'hit' => $hit,
                    'content' => $content]);
        }
        public function getItem($board_id){
            $this->board_id = $board_id;
            $m_item = $this->model('m_item');
            $result = $m_item->getItem($board_id);

            $this->index($board_id, $result[0], $result[1], $result[2], $result[3]);
        }

        public function modify($board_id){
            $m_item = $this->model('m_item');
            $result = $m_item->getInfo($board_id);

            $this->view('v_upload_item',
                ['board_id' => $board_id,
                    'title' => $result[0],
                    'content' => $result[3]]);
        }

        public function delete($board_id){
            $m_item = $this->model('m_item');

            $result = $m_item->delete($board_id);

            if($result){
                ?>
                    <script>
                        alert("DELETED!");
                        location.href = '../../';
                    </script>
                <?php
            }else{
                ?>
                <script>
                    alert("FAILED!");
                    location.href = '../../';
                </script>
                <?php
            }

        }
    }