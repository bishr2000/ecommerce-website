<?php

    require_once('DB.php');
    class Customer{
        private $username;
        private $password;
        private $con;

        function __construct(){
            $object = new Connection;
            $this->con = $object->connect();
            require_once("header.php");
        }

        public function signup(){
            // Storing the entries in php variables to send to the database
            extract($_POST);
            $sql = "INSERT INTO customers VALUES
                        ('$emailaddress', '$password', '$complete_name', '$address1',
                        '$address2','$city', '$state', '$zipcode', '$country', '$phone_no')";
            if ($this->con->query($sql) === TRUE) {
                echo "dear $complete_name your account has been successfully create";
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['name'] = $complete_name;
                printf("<SCRIPT LANGUAGE=\"JavaScript\">updateUser('%s');</SCRIPT>", $complete_name); 
            } else {
                echo "Error: " . $sql . "<br>" . $this->con->error;
            }
        }

        public function login(){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $query = "SELECT email_address, password, complete_name
                    FROM customers WHERE email_address LIKE '" . $_POST['emailAddress'] . "' AND
                    password LIKE '" . $_POST['password'] . "';";
            $result = mysqli_query($this->con, $query) or die(mysql_error()); 
            if (mysqli_num_rows($result) == 1) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    extract($row);
                    echo "Welcome " . $complete_name . " to our Shopping Mall <br>";
                }
                $_SESSION['name'] = $complete_name;
                printf("<SCRIPT LANGUAGE=\"JavaScript\">updateUser('%s');
                    </SCRIPT>", $complete_name); 
            }else {
        ?>
        Invalid Email address and/or Password<br> 
        Not registered?
        <a href="login.php">Click here</a> to register.<br><br><br>
        Want to Try again<br>
        <a href="signup.php">Click here</a> to try login again.<br> ?>
        <?php
            }
        }
        
        function logout(){
            if(isset($_SESSION['name'])){
                unset($_SESSION['name']);
                session_destroy();
            }
        }
    }
    