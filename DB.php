<?php
    class Connection{
        private const HOST = "localhost";
        private const USERNAME = "root";
        private const PASSWORD = "hellonyou";
        private const DATABASE = "shopping";

        public function connect(){
            $connect = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE) or die("Please check your connection");
            return $connect;
        }
        
    }
