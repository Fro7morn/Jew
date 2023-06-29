<?php
use app\entity\ColorDir;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

$dataprovider = new ActiveDataProvider([
    'query' => ColorDir::find(),
    'pagination' => [
        'pageSize' => 20,
    ]
]);

echo GridView::widget([
   'dataProvider' => $dataprovider,
   'columns' => [
       'id',
       'name'
   ]
]);