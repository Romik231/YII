<?php


namespace app\components;


use app\base\BaseActivityComponent;
use app\models\Activity;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends BaseActivityComponent
{
    public $classModel;

    public function getModel(){
        return new $this->classModel;
    }

    public function createActivity(Activity &$activity): bool
    {
        $activity->file=UploadedFile::getInstances($activity, 'file');
        $activity->user_id=\Yii::$app->user->getId();

        if(!$activity->save()){
            return false;
        }
        if($activity->file){
            $fileName=$this->saveUploadedFile($activity->file);
            $activity->file=$fileName;
        }

        return true;
    }

    private function saveUploadedFile(UploadedFile $uploadedFile): ?string {

        $fileName=$this->getFileName($uploadedFile);
        $path=$this->getSavePath();
        if($uploadedFile->saveAs($path.$fileName)){
            return $fileName;
        }else{
            return null;
        }

    }

    private function getSavePath():string {

        FileHelper::createDirectory(\Yii::getAlias('@webroot/images/'));
        return \Yii::getAlias('@webroot/images/');
    }


    private function getFileName(UploadedFile $uploadedFile):string {

        return time().'.'.$uploadedFile->extension;
    }

}