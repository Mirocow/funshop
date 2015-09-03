<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\redactor\models;

use yii\helpers\FileHelper;

/**
 * @author Nghia Nguyen <yiidevelop@hotmail.com>
 * @since 2.0
 */
class ImageUploadModel extends FileUploadModel
{
  
    public $extensions = ['jpg','png','gif','bmp','jpe','jpeg','jpeg'];
    
    public $checkExtensionByMimeType = true;
  
    /*public function rules()
    {
        return [
            ['file', 'file', 'extensions' => 'jpg,png,gif,bmp,jpe,jpeg,jpeg']
        ];
    }*/

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['file', 'validateExtension'];
        
        return $rules;
    }
    
    public function validateExtension($attribute, $params){
      
        $file = $this->$attribute;
      
        $pathinfo = pathinfo(mb_strtolower($file->name, 'utf-8'));
        
        if(!empty($pathinfo['extension'])){
          $extension = $pathinfo['extension'];
        } else
          return false;
        
        if ($this->checkExtensionByMimeType) {
            $mimeType = FileHelper::getMimeType($file->tempName, null, false);
            if ($mimeType === null) {
                return false;
            }
            
            if(!FileHelper::getMimeTypeByExtension($file)){
              return false;
            }
        }
        
        if (!in_array($extension, $this->extensions, true)) {
            return false;
        }
        
        return true;
      
    }    
}