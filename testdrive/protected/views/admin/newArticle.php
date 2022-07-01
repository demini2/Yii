<div class="container-fluid">

    <form name="red" method="post" action="newArticle.php">
        <p><b>Новый заголовок</b><Br>
            <textarea class="form-control" name="newTitle" required maxlength="150" cols="40" rows="3"></textarea>
        </p>
        <p><b>Текст новости</b><Br>
            <textarea class="form-control" name="newContent" required maxlength="5000" cols="40" rows="3"></textarea>
        </p>
        <p><b>Автор новости</b>
            <textarea class="form-control" name="author" maxlength="150" rows="1"></textarea>
        </p>
        <button class="btn btn-outline-dark" name=""
                formaction="?r=admin/newArticle"
                type="submit">Добавить новую запись
        </button>
    </form>

</div>

