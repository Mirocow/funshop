yii2-redactor
=============

[![Latest Stable Version](https://poser.pugx.org/mirocow/yii2-redactor/v/stable)](https://packagist.org/packages/mirocow/yii2-redactor) [![Total Downloads](https://poser.pugx.org/mirocow/yii2-redactor/downloads)](https://packagist.org/packages/mirocow/yii2-redactor) [![Latest Unstable Version](https://poser.pugx.org/mirocow/yii2-redactor/v/unstable)](https://packagist.org/packages/mirocow/yii2-redactor)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

### Add github repository


```json
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/mirocow/yii2-redactor.git"
        }
    ]
```

and then

```
php composer.phar require --prefer-dist "mirocow/yii2-redactor" "*"
```

or add

```json
"mirocow/yii2-redactor" : "*"
```

to the require section of your application's `composer.json` file.

Configurate
=====

```php

	'components' => [
        'redactor' => [
          'class' => 'yii\redactor\RedactorModule'
        ],
      ] 
        
```

Using
=====

```php
use yii\redactor\widgets\Redactor;

        <?= Redactor::widget(
          [
            'model' => $model,
            'attribute' => 'description',
            'options' => [
              'style' => 'width: 100%; height: 340px;',
            ],
            'clientOptions' => [
				        'imageManagerJson' => \yii\helpers\Html::url('/redactor/upload/imagejson'),
				        'imageUpload' => \yii\helpers\Html::url('/redactor/upload/image'),
				        'fileUpload' => \yii\helpers\Html::url('/redactor/upload/file'),
				        'lang' => 'en',
				        'plugins' => ['fontcolor', 'filemanager', 'imagemanager', 'table', 'undoredo'],
                		'placeholder' => 'Please add description',
            ],
          ]
        ); ?>	
```
