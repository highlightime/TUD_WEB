<?php
    class c_Logout extends Controller {
        public function getLogout(){
            $m_logout = $this->model('m_logout');
            $result = $m_logout->getLogout();

            if($result){
                ?>
                <script>
                    alert('LOGOUT!');
                    location.href = '../';
                </script>
                <?php
            }else{
                print_r("fail");
            }

        }
    }
