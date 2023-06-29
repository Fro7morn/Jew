<?php

namespace app\controllers;
use app\models\ChangePasswordForm;
use app\models\ContactForm;
use app\Repository\UserRepository;
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
            UserRepository::changePassword(Yii::$app->user->id, $model->newpassword);
            $this->redirect('profile');
        }
        return $this->render('change-password', [
            'model' => $model,
        ]);
    }
}