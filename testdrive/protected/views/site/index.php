<?php
/* @var $this SiteController */
/* @var $news News[] */
?>
<?php foreach ($news as $article) { ?>
    <h1>
        <a href="/Yii/testdrive/index.php?r=site/article&news=<?= $article->getId() ?>"> <?= $article->getTitle() ?> </a>
    </h1>
<?php } ?>


