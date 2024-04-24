
<?php

        require_once('Customer.php');
        $object = new Customer;
        if(isset($_REQUEST['login'])){
                unset($_REQUEST['login']);
                $object->login();
                
        }
        elseif(isset($_REQUEST['signup'])){
                unset($_REQUEST['signup']);
                $object->signup();
        }
        elseif(isset($_REQUEST['logout'])){
                unset($_REQUEST['logout']);
                $object->logout();
                header("Location: index.php");
                die();
                
        }
?>
