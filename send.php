<?php
include 'work-with-file.php';

if(checkData()) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $com = $_POST['comment'];

}

$res = '';

if(!empty($com))
    $res = writeComment(DB . '/comments.txt', $name, $email, $com);
