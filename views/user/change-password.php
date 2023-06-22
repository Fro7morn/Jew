<?php ?>
<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'oldpassword')->passwordInput()?>
    <?= $form->field($model, 'repeatpassword')->passwordInput() ?>
    <?= $form->field($model, 'newpassword')->passwordInput([
    ]) ?>

    <div class="form-group">
        <div class="offset-lg-1 col-lg-11">
            <?= Html::submitButton('Сменить пароль') ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

