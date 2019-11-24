<?php
    class c_Signup extends Controller {

        public function index(){
            $this->view('v_signup');
        }
        public function getSignup(){
            $m_signup = $this->model('m_signup');

            #validate()

            $result = $m_signup->getSignup();
            if($result){
                ?>
                    <script>
                        alert("SIGNED UP!");
                        location.href = '../c_login/index';
                    </script>
                <?php
            }else{
                ?>
                <script>
                    alert("FAILED!");
                </script>
                <?php
                $this->index();
            }
        }
        public function  update(){

        }
    }