<?php
/**
 *
 * The followings are the available columns in table 'users_likes':
 * @property integer $id
 * @property string $user_login
 *
 */
class Users_likes extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}