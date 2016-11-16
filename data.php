<?php
include 'function.php';
require "vendor/autoload.php";
$faker = \Faker\Factory::create();

// GITHUB: https://github.com/fzaninotto/Faker

$host = 'localhost';
$base = 'php04';
$user = 'root';
$pass = '';

$connection = @new mysqli($host, $user, $pass, $base);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

$connection->query('SET NAMES "UTF-8"');

/* добавление данных */

 $sqluser = 'insert into `users` (`firstName`, `lastName`, `address`) values (?,?,?);';
 $sqlcontact = 'insert into `contacts` (`user_id`, `type`, `contact`) values (?,?,?);';

 $countUsers = 0;
 $countContacts = 0;
 for($u = 0; $u < 13; $u++) {

     $stmt = $connection->prepare($sqluser);
     $firstName = $faker->firstName;
     $lastName = $faker->lastName;
     $address = $faker->postcode.', '.$faker->streetAddress.', '.$faker->city.', '.$faker->state;

     $stmt->bind_param('sss', $firstName, $lastName, $address);
     $stmt->execute();
     $countUsers++;

     $user_id = $connection->insert_id;

     $n = mt_rand(1,4);
     for($i = 0; $i < $n; $i++) {
         $t = mt_rand(0,1);
         switch ($t) {
             case 0: $type = 'email';
                     $value = $faker->email;
                     break;
             case 1: $type = 'phone';
                     $value = $faker->phoneNumber;
                     break;
         }
         $countContacts++;
         $stmt = $connection->prepare($sqlcontact);
         $stmt->bind_param('iss', $user_id, $type, $value);
         $stmt->execute();
     }
 }

