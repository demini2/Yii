<?php
/**
 * @var $news \News
 */
?>
<form name="red" method="post" action="article.php">
    <h1> <?= $news->getTitle() ?> </h1>
    <h3> <?= $news->getContent() ?> </h3>
    <br>
    <?php if (!empty($news->getAuthor())) { ?>
        <h4>Автор: <?= $news->getAuthor() ?></h4>
    <?php } ?>
    <button class="btn btn-outline-dark"
            name="idNewsDelete" value="<?= $news->getId() ?>"
            formaction="?r=admin/delete"
            type="submit">Удалить
    </button>
    <br>
    <br>
    <p><b>Новый заголовок</b><Br>
        <textarea class="form-control" name="newTitle"  maxlength="150" cols="40" rows="3"></textarea>
    </p>
    <p><b>Текст новости</b><Br>
        <textarea class="form-control" name="newContent"  maxlength="5000" cols="40" rows="3"></textarea>
    </p>

    <button class="btn btn-outline-dark"
            name="idNewsUpdate" value="<?= $news->getId() ?>"
            formaction="?r=admin/article&news=<?= $news->getId() ?>"
            type="submit">Редактировать
    </button>
</form>