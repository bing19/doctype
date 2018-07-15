

<?php
    $title = 'Index';
?>
<div class="container logo">
    <h1><?= $title ?></h1>
</div>
<?php
    if(!empty(readComment($file))) {
        $comments = readComment($file);
        include 'view/comments.php';
    }

?>

<div class="container">

    <form method="post" action="send.php">
        <label>Имя
        <input type="text" name="name" value="<? if(isset($name)) echo $name ?>"></label>
        <label>E-Mail
        <input type="text" name="email" value="<? if(isset($email)) echo $email ?>"></label>
        <label>Комментарий
            <textarea  rows="10" cols="40" name="comment"><? if(isset($com)) echo $com ?></textarea></label>
        <input type="submit" value="Отправить">
    </form>
    <?php if (!empty ($_GET['msg'])) : ?>
        <div>Файл записан</div>
    <?php endif ?>


</div>

