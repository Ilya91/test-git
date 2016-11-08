<?php
require "init.php";
$id= $_GET['id'];

if(!empty($id))
{
    $user = User::find($id);
    $user->username = $_POST['name'];
    $user->password= $_POST['password'];
    $user->age= $_POST['info'];
    $user->save();
}
