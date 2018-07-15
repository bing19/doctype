<?php

define('DB', __DIR__ . '/db/');




/**
 * Проверки
 */
//file_exists($file);
//is_file($file);
//is_writable($file);
//is_readable($file);


/**
 * Действия с файлом
 */
//unlink($file);
//copy();
//rename();


/**
 * Инфо о файле
 */

//filesize();
//basename();
//pathinfo();


$file = DB . 'comments.txt';

function checkData () {
    if(!empty ($_POST['name']) || !empty($_POST['email']) || !empty($_POST['comment']))
        return true;

    return false;

}

function dbWrite ($file, $arr) {

    $hundler = fopen($file, 'w');
    $data = '';
    $num = count($arr);
    foreach ($arr as $key => $value) {
        $data .= $value['title'] . '::' . $value['link'];
        if($key < $num-1) {
            $data .= "\n";
        }
    }
    if (is_writable($file)) {
        fwrite($hundler, $data);
        fclose($hundler);
    }
    copy($file, DB . 'db-' . date('Ymd') . '.txt');
}

/**
 * Сохраненние комментария в файл
 * @param $file
 * @param $name
 * @param $email
 * @param $coment
 */
function writeComment ($file, $name, $email, $coment) {

    $hundler = fopen($file, 'a+');
    $data = '';
    $data .= $name . '::' . $email . '::' . $coment . '::' . date('d.m.Y') . "\n";
    
    if (is_writable($file)) {
        $res = fwrite($hundler, $data);
        fclose($hundler);
    }

    if($res !== false)
        header('Location: index.php?msg=success');


    return false;

}

function readComment ($file) {

    $hundler = fopen($file, 'r');
    $arr = [];
    while (!false == $buffer = fgets($hundler)) {
        if($buffer !== '') {
            $tmparr = explode('::', $buffer);
            $arr[] = [
                'name' => $tmparr[0],
                'email' => $tmparr[1],
                'comment' => $tmparr[2]
            ];
        }



    }
    fclose($hundler);

    return array_reverse($arr);

}

function dbRead ($file, &$data = null) {

    $data = [];

    if (file_exists($file) && pathinfo($file, PATHINFO_EXTENSION) == 'txt') {
        $hundler = fopen($file, 'r');

        while(false != $buffer = fgets($hundler)){
            $source = explode('::', $buffer);
            $data [] = ['title' => $source[0], 'link' => $source[1]];
        }
        $data['file-info']= [
            'file-size' => filesize($file),
            'basename' => basename($file),
            'pathinfo' => pathinfo($file)
        ];
        fclose($hundler);
    } elseif (file_exists($file) && pathinfo($file, PATHINFO_EXTENSION) == 'php') {
        $hundler = fopen($file, 'r+');
        fseek($hundler, filesize($file) -30);
        while(!false == $buffer = fgets($hundler)) {

        }
        fclose($hundler);

    }

    return $data;
}

function getMenu ($menu, $template = 'menu') {
    foreach ($menu as $item) {
        include 'view/'. $template . '.php';
    }
}


