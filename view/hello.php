<?php
$title = 'Hello'; ?>
<div class="container logo">
    <h1><?= $title ?></h1>
</div>
<div class="container">
    <form method="post">
        <label>Имя
            <input type="text" name="name" value="<? if(isset($name)) echo $name ?>"></label>
        <label>E-Mail
            <input type="text" name="email" value="<? if(isset($email)) echo $email ?>"></label>
        <input type="submit" value="Отправить">
    </form>
</div>

