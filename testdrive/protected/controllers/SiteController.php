<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     * @return array
     */
    public function actions(): array
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),

        );
    }

    /**
     * рисуем все новости
     * @throws \Exception
     */
    public function actionIndex(): void
    {
        $news = new News();
        $title = $news->findAll();
        if (empty($title)) {
            throw new Exception('нет новостей');
        }
        $this->render('index', ['news' => $title]);

    }

    /**
     * рисуем новость по Id
     * @return void
     * @throws \Exception
     */
    public function actionArticle(): void
    {
        if (empty($_GET['news'])) {
            throw new Exception('не пришел запрос, ожидается news');
        }
        $news = News::model()->getArticle($_GET['news']);
        if (null == $news) {
            throw new Exception('новости нет');
        }
        $this->render('article', ['news' => $news]);
    }

    /**
     * This is the action to handle external exceptions.
     * @return void
     */
    public function actionError(): void
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     * @return void
     */
    public function actionLogin(): void
    {
        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate() && $model->login()) {
                $this->redirect('?r=admin/index');
            }
        }
        $this->render('login', ['model' => $model]);
    }

    /**
     * Logs out the current user and redirect to homepage.
     * @return void
     */
    public function actionLogout(): void
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}