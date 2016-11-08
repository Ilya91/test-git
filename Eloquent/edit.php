<?php
require "init.php";
$id=$_GET['id'];

if(empty($id)) die('no user id');

$user = User::find($id);
?>

<form action="save.php?id=<?= $id ?>" method="post">
    <input type="text" name="name" value="<?=$user->username?>"/> <br>
    <input type="text" name="password" value="<?=$user->password?>"/> <br>
    <textarea name="info" id="" cols="30" rows="10">
        <?=$user->age;?>
    </textarea><br>
    <input type="submit">
</form>
