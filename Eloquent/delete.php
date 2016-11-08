<?php
require "init.php";
$id= $_GET['id'];

if(!empty($id))
{
    $user = User::destroy($id);
    print_r($user);
}
