<?php

namespace app\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\db\BaseActiveRecord;

class MyBehavior extends Behavior
{
    public $name;

    public $attributes = [
        BaseActiveRecord::EVENT_BEFORE_VALIDATE => 'name',
        //BaseActiveRecord::EVENT_BEFORE_UPDATE => 'last_name',
    ];

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    public function beforeValidate($event)
    {
        //var_dump($this);
        //var_dump($this->owner->attributes);
        var_dump($event->sender->name);
        //var_dump($this->name);
        //var_dump($this->attributes);
        exit;
    }
}