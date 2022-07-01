<?php


class AdminController extends Controller
{
    /**
     * рисуем все новости
     * @return void
     * @throws \Exception
     */
    public function actionIndex(): void
    {
        $news = News::model()->findAll();
        if (empty($news)) {
            throw new Exception('новости закончились');
        }
        $this->render('index', ['news' => $news]);
    }

    /**
     * рисиуем одно новость по Id
     * если необходимо редактируем
     * @return void
     * @throws \Exception
     */
    public function actionArticle(): void
    {
        if (empty($_GET['news'])) {
            throw new Exception('нет такой новости');
        }
        $news = News::model()->getArticle($_GET['news']);
        if (!empty($_POST['newTitle']) && !empty($_POST['newContent'])) {
            $news->id = $_POST['idNewsUpdate'];
            $news->title = $_POST['newTitle'];
            $news->content = $_POST['newContent'];
            $news->save();
            $this->redirect('index.php?r=admin/article&news=' . $news->getId());
        }
        $this->render('article', ['news' => $news]);

    }

    /**
     * удаляем новость по Id
     * @return void
     * @throws \CDbException
     * @throws \Exception
     */
    public function actionDelete(): void
    {

        if (empty($_POST['idNewsDelete'])) {
            throw new Exception('не не пришел запрос, ожидается idNewsDelete');
        }
        $news = News::model()->findByPk($_POST['idNewsDelete']);
        $news->delete();
        $this->redirect('index.php?r=admin/index');

    }

    /**
     * рисуем шаблон для новой новости
     * сохраняем ее в дазу
     * @return void
     */
    public function actionNewArticle(): void
    {
        if (!empty($_POST['newContent']) && !empty($_POST['newTitle'])) {
            $news = new News();
            $news->author_id = Authors::model()->getAuthorId($_POST['author']);
            $news->title = $_POST['newTitle'];
            $news->content = $_POST['newContent'];
            $news->save();
        }

        $this->render('newArticle');
    }
}