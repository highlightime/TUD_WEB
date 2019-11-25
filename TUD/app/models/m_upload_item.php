<?php
    class m_Upload_item{
        private $connect;
        private $title;
        private $content;
        private $author;
        private $date;
        private $file_name;
        private $target_file;
        private $uploadOk;

        public function __construct()
        {
            session_start();

            $this->title = $_POST['title'];
            $this->content = $_POST['content'];
            $this->author = $_SESSION['id'];
            $this->date = date('Y-m-d');


            $this->file_name = basename($_FILES["file"]["name"]);
            $this->target_file = "../public/files/" . $this->file_name;
            $this->uploadOk = 1;

            $this->connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
        }

        public function upload(){

            if($_FILES['file']['error'] == 0) { //if there is no error, like there is no file to upload
                if (file_exists($this->target_file)) { // Check if file already exists
                    ?>
                    <script>
                        alert("Sorry, file already exists.");
                    </script>
                    <?php

                    $this->uploadOk = 0;
                }
                if ($this->uploadOk == 0) { // Check if $uploadOk is set to 0 by an error
                    ?>
                    <script>
                        alert("Sorry, your file was not uploaded.");
                    </script>
                    <?php
                } else {
                    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $this->target_file)) { // if everything is ok, try to upload file
                        ?>
                        <script>
                            alert("Sorry, there was an error uploading your file.");
                        </script>
                        <?php
                    }
                }
            }
            $query = "insert into board (title, content, author, date, hit, file) values ('$this->title', '$this->content', '$this->author', '$this->date', 0, '$this->file_name')";

            if($this->uploadOk == 1) {
                $result = $this->connect->query($query);

                if ($result) {
                    return true;
                } else {
                    return false;
                }
                $this->connect->close();
            }
        }
        public function modify($board_id){
            $this->title = $_POST['title'];
            $this->content = $_POST['content'];
            $this->date = date('Y-m-d');

            $query = "update board set title = '$this->title', content = '$this->content', date = '$this->date' where board_id = '$board_id'";

            $result = $this->connect->query($query);

            if($result){
                return true;
            }else{
                return false;
            }
            $this->connect->close();
        }

        public function validate(){
            if($this->title == '' || $this->content == ''){
                return false;
            }else{
                return true;
            }
        }
    }