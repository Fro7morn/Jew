<?php

namespace app\controllers;
use app\models\ChangePasswordForm;
use app\models\ContactForm;
use Yii;

class UserController extends \yii\web\Controller
{
    public function actionProfile() {
        $user = \Yii::$app->user->identity;
        return $this->render('profile', [
            'user' => $user
        ]);
    }
    public function actionChangePassword() {
        $model = new ChangePasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            var_dump($model);
        }
        return $this->render('change-password', [
            'model' => $model,
        ]);
    }
}