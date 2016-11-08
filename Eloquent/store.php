<?php
require "init.php";

    $user = new User();
    $user->username = $_POST['name'];
    $user->password= $_POST['password'];
    $user->age= $_POST['info'];
    $user->save();

