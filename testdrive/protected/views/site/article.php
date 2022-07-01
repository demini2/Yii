<?php
/**
 * @var $news \News
 */
?>
<?php //foreach ($news as $r) { ?>

    <h1> <?= $news->getTitle() ?> </h1>
    <h3> <?= $news->getContent() ?> </h3>
<?php if (!empty($news->getAuthor())) { ?>
    <h3> Автор:<?= $news->getAuthor() ?> </h3>
<?php } ?>
<?php //} ?>