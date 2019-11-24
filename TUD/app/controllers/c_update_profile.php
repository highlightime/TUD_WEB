<?php
    class c_Update_profile extends Controller{
        public function update(){
            $m_update_profile = $this->model('m_update_profile');

            if($m_update_profile->validate()) {
                $result = $m_update_profile->update();
                if ($result) {
                    ?>
                    <script>
                        alert("UPDATED!");
                        location.href = '../';
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
                    alert("PLEASE FILL IN ALL AREA!");
                    location.href = '../';
                </script>
                <?php
            }
        }
    }