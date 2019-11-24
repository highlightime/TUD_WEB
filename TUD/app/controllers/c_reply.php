<?php
    class c_Reply extends Controller{

        public function index($result = []){
            $this->view('v_reply', $result);
        }

        public function getReply($board_id){
            $m_reply = $this->model('m_reply');
            $result = $m_reply->getReply($board_id);
            $this->index($result);

        }
        public function uploadReply($board_id){
            $m_reply = $this->model('m_reply');

            if($m_reply->validate()) {
                $result = $m_reply->uploadReply($board_id);

                if ($result) {
                    ?>
                    <script>
                        alert("UPLOADED!");
                        location.href = '../../c_item/getItem/<?=$board_id?>';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("FAILED!");
                        location.href = '../../c_item/getItem/<?=$board_id?>';
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert("PLEASE WRITE DOWN SOMETHING!");
                    location.href = '../../c_item/getItem/<?=$board_id?>';
                </script>
                <?php
            }
        }
    }