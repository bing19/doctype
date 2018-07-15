<div class="container">

        <?php foreach ($comments as $comment) : ?>
        <div class="com-item">
            <div class="name"><?= $comment['name'] . '  -  ' . $comment['email'] ?></div>
            <p class="comment"><?= $comment['comment'] ?></p>
        </div>
        <?php endforeach; ?>

</div>
