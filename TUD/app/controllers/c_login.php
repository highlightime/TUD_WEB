<?php
    class c_Login extends Controller {

        public function index(){
            $this->view('v_login');
        }
        public function getLogin(){
            $m_login = $this->model('m_login'); #get m_login instance

            $result = $m_login->getLogin();
            if ($result) {
                ?>
                <script>
                    alert('LOGIN!');
                    location.href = '../';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('LOGIN FAILED!');
                </script>
                <?php
                $this->index();
            }
        }
    }