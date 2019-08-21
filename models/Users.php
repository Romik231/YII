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

    const SCENARIO_SIGNIN = 'signin';
    const SCENARIO_SIGNUP = 'signup';

    public function scenarionSignin()
    {
        $this->setScenario(self::SCENARIO_SIGNIN);
        return $this;
    }

    public function scenarioSignup()
    {
        $this->setScenario(self::SCENARIO_SIGNUP);
        return $this;
    }

    public function rules()
    {
        return array_merge([
            ['password', 'string', 'max' => 5],
            [['email'], 'unique', 'on' => self::SCENARIO_SIGNUP],
        ], parent::rules());
    }
}
