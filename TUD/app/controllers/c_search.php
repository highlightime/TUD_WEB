<?php
    class c_Search extends Controller{
        public function index($result = []){
            $this->view('v_items', $result);
        }
        public function getItems(){
            $m_search = $this->model('m_search');

            if($m_search->validate()) {
                $result = $m_search->getItems();

                if ($result) {
                    $this->index($result);
                } else {
                    $this->index();
                }
            }else{
                ?>
                    <script>
                        alert("PLEASE WRITE DOWN SOMETHING");
                        location.href = '../';
                    </script>
                <?php
            }
        }
    }
