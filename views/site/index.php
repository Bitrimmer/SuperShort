<?php

/** @var yii\web\View $this */

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\models\Link;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">

    </div>

    <div class="container">
        <form>
            <div class="form-group">
                <input type="text" maxlength="600" class="form-control" id="link" placeholder="введите ссылку">
                <small id="shortLink" class="form-text text-muted"></small>
            </div>
            <button type="button" class="btn btn-primary w-100">Сократить</button>
        </form>

        <?php
        $i = 0;
        $date = new DateTime();
        $time_at = $date->modify('first Mon of this month');
        $time_at = $date->getTimestamp();
        $time_do = $date->modify('last Mon of this month');
        $time_do = $date->getTimestamp();
        $dataProvider = new ActiveDataProvider([
            'query' => Link::find()->where(['>=', $time_at, 'date'])->andWhere(['>=', $time_do, 'date'])->groupBy(['id','count_ref']),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'date',
                'link',
                'short',
                'count_ref',
                'lider' => [
                    'attribute' => 'lider',
                    'format' => 'raw',
                    'value' => function ($model, $key, $index, $column) {
                         return $index;
                    },
                ],
            ]

        ]);

        ?>

    </div>
</div>
