<?php /**
 * @var $content
 * @var $this Controller
 */
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

?>
<!DOCTYPE html>
<html lang="ru">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css?v=2">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <title>aga</title>
</head>
<body>
<div class="container-fluid" id="page">

    <div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu', [
            'items' => [
                ['label' => 'admin', 'url' => ['/admin/index'], 'visible' => !Yii::app()->user->isGuest],
                ['label' => 'Home', 'url' => ['/site/index'], 'visible' => Yii::app()->user->isGuest],

                ['label' => 'Login', 'url' => ['/site/login'], 'visible' => Yii::app()->user->isGuest],
                ['label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => ['/site/logout'], 'visible' => !Yii::app()->user->isGuest]
            ],
        ]); ?>
    </div>

    <?php echo $content; ?>

</div>
</body>
</html>
