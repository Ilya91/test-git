<?php
require('init.php');

for($i=0;$i<30;$i++)
{
    $faker = Faker\Factory::create();
    $user = new User();
    $user->name = $faker->name;
    $user->password = $faker->password;
    $user->info = $faker->text;
    $user->created_at = $faker->dateTime;
    $user->save();

}