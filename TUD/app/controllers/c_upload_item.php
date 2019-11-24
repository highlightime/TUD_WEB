<?php
    class c_Upload_item extends Controller {
        public function index(){
            $this->view('v_upload_item');
        }
        public function upload(){
            $m_upload_item = $this->model('m_upload_item');

            if($m_upload_item->validate()) {
                $result = $m_upload_item->upload();
                if ($result) {
                    ?>
                    <script>
                        alert("UPLOADED");
                        location.href = '../';
                    </script>
                    <?php
                } else { #if fail stay
                    ?>
                    <script>
                        alert("FAILED");
                    </script>
                    <?php
                    $this->view('index');
                }
            }else{
                ?>
                <script>
                    alert("PLEASE FILL IN TITLE AND CONTENT!");
                    location.href = '../';
                </script>
                <?php
            }
        }

        public function modify($board_id){
            $m_upload_item = $this->model('m_upload_item');

            if($m_upload_item->validate()) {
                $result = $m_upload_item->modify($board_id);

                if ($result) {
                    ?>
                    <script>
                        alert("UPDATED!");
                        location.href = '../../c_item/getInfo/<?=$board_id?>';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("FAILED!");
                        location.href = '../';
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert("PLEASE FILL IN TITLE AND CONTENT!");
                    location.href = '../';
                </script>
                <?php
            }
        }
    }
