<?php
require "init.php";
$id= $_GET['id'];

if(!empty($id))
{
    echo "<pre>";
    $user = User::take(5)
//        ->where('asd', 'like')
        ->with('posts')
        ->get();


    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Door', 'price' => 100],
    ]);

    $filtered = $collection->whereLoose('price', 'like','100');

    $filtered->all();

    print_r($filtered);


//    $posts = Post::with('userdata')->where('user_id', 17)->get()->toArray();
//    print_r($posts);
}
