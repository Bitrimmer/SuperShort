<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property int $id
 * @property string $date
 * @property string $link
 * @property string|null $short
 * @property int|null $count_ref
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['link'], 'required'],
            [['count_ref'], 'integer'],
            [['link'], 'string', 'max' => 600],
            [['short'], 'string', 'max' => 50],
            [['short'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'link' => 'Link',
            'short' => 'Short',
            'count_ref' => 'Count Ref',
        ];
    }


    /**
     * {@inheritdoc}
     * @return LinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LinkQuery(get_called_class());
    }
}
