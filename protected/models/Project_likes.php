<?php
/**
 *
 * The followings are the available columns in table 'project_likes':
 * @property integer $id
 * @property string $project_name
 *
 */
class Project_likes extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}