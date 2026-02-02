<?php
if(isset($_POST['signup'])) {
    echo "Your Username is: " . $_POST['username'] . "</br>";
    echo "Your Email is: " . $_POST['email'] . "</br>";
    echo "Your Password is: " . $_POST['password'] . "</br>";
    echo "Your Address is: " . $_POST['address'] . "</br>";
}

if(isset($_POST['login'])) {
    echo "Your Email is: " . $_POST['email'] . "</br>";
    echo "Your Password is: " . $_POST['password'] . "</br>";
}
?>