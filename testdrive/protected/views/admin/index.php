<?php
/* @var $this AdminController */
/**
 * @var $news  \News[]
 */
$this->breadcrumbs = ['Admin'];
?>


<p>
    <?php foreach ($news as $article) { ?>
    <h1>
        <a href="?r=admin/article&news=<?= $article->getId() ?>"> <?= $article->getTitle() ?> </a>
    </h1>
<?php } ?>

</p>

<form name="red" method="post" action="index.php">
    <button class="btn btn-outline-dark"
            formaction="?r=admin/newArticle"
            type="submit">Новая запись
    </button>
</form>