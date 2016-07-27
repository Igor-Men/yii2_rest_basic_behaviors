<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use app\components\MyBehavior;
use  yii\base\Component;

/**
 * This is the model class for table "agent".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $create_time
 * @property string $update_time
 */
class Agent extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'last_name'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {

            // attach a behavior object
            $component->attachBehavior('myBehavior1', new MyBehavior);

            // attach a behavior class
            $component->attachBehavior('myBehavior2', MyBehavior::className());

            // attach a configuration array
            $component->attachBehavior('myBehavior3', [
                'class' => MyBehavior::className(),
                'prop1' => 'value1',
                'prop2' => 'value2',
            ]);
        }

    }

    /**
     * @inheritdoc
     * @return AgentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AgentQuery(get_called_class());
    }

    /*public function behaviors()
    {
        return [

//            [
//                'class' => SluggableBehavior::className(),
//                'attribute' => 'title',
//                'slugAttribute' => 'alias',
//                'ensureUnique' => true,
//            ],



            [
                    'class' => MyBehavior::className(),
                    //'name' => $this->name,
            ]
        ];
    }*/
}
