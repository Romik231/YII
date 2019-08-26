<?php


namespace app\components;


use app\base\BaseComponent;
use app\models\Activity;
use app\rules\ViewEditOwnerRule;

class RbacComponent extends BaseComponent
{
    public function getManager()
    {
        return \Yii::$app->authManager;
    }

    public function initRbacRules()
    {
        $manager=$this->getManager();
        $manager->removeAll();

        $admin=$manager->createRole('admin');
        $user=$manager->createRole('user');

        $manager->add($admin);
        $manager->add($user);

        $createActivity=$manager->createPermission('createActivity');
        $createActivity->description='Создание активности';
        $manager->add($createActivity);

        $viewEditOwnerActivity=$manager->createPermission('viewEditOwnerActivity');
        $viewEditOwnerActivity->description='Просмотри редактирование своего события';

        $rule=new ViewEditOwnerRule();
        $viewEditOwnerActivity->ruleName=$rule->name;
        $manager->add($rule);

        $manager->add($viewEditOwnerActivity);

        $viewEditAll=$manager->createPermission('viewEditAll');
        $viewEditAll->description='Просмотри редактирование всех событий ';
        $manager->add($viewEditAll);

        $manager->addChild($user, $createActivity);
        $manager->addChild($user, $viewEditOwnerActivity);
        $manager->addChild($admin,$user);
        $manager->addChild($admin, $viewEditAll);

        $manager->assign($admin,1);
        $manager->assign($user, 2);
        $manager->assign($user, 3);

    }

    public function canCreataActivity(): bool {
        return \Yii::$app->user->can('createActivity');
    }

    public function canViewEditAll(Activity $activity){
        if(\Yii::$app->user->can('viewEditAll')){
            return true;
        }

        if (\Yii::$app->user->can('viewEditOwnerActivity',['activity'=>$activity])){
            return true;
        }
        return false;
    }
}