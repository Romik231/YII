<?php


namespace app\components;


use app\base\BaseComponent;

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
        $manager->add($viewEditOwnerActivity);

        $viewEditAll=$manager->createPermission('viewEditAll');
        $viewEditAll->description='Просмотри редактирование всех событий ';
        $manager->add($viewEditAll);

        $manager->addChild($user, $createActivity);
        $manager->addChild($user, $viewEditOwnerActivity);
        $manager->addChild($admin,$user);
        $manager->addChild($admin, $viewEditAll);

        $manager->assign($admin,3);
        $manager->assign($user, 4);
        $manager->assign($user, 1);

    }

    public function canCreataActivity(): bool {
        return \Yii::$app->user->can('createActivity');
    }
}