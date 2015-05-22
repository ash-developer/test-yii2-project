<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "publications".
 *
 * @property integer $id
 * @property integer $channel_id
 * @property string $date
 *
 * @property Channels $channel
 */
class Publication extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['channel_id'], 'integer'],
            [['date'], 'required'],
            [['date'], 'safe'],
            [['channel_id', 'date'], 'unique', 'targetAttribute' => ['channel_id', 'date'], 'message' => 'The combination of Channel ID and Date has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannel()
    {
        return $this->hasOne(Channel::className(), ['id' => 'channel_id']);
    }
}
