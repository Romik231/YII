<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $token
 * @property string $auth_key
 * @property string $createdAt
 *
 * @property Activity[] $activities
 */
class Users extends UsersBase
{
    public $password;

    public function rules()
    {
        return array_merge([
            ['password', 'string', 'min' => 5],
            [['email'], 'unique'],
        ], parent::rules());
    }
}
