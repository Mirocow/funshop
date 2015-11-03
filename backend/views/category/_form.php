<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
$parentCategory = ArrayHelper::merge([0 => Yii::t('blog', 'Root Catalog')], ArrayHelper::map(Category::get(0, Category::find()->asArray()->all()), 'id', 'label'));
unset($parentCategory[$model->id]);
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'id' => 'mend-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}{hint}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <fieldset class="scheduler-border">
      <legend class="scheduler-border">Category</legend>
      <?= $form->field($model, 'parent_id')->dropDownList($parentCategory) ?>

      <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

      <?= $form->field($model, 'brief')->textInput(['maxlength' => 255]) ?>

      <?= $form->field($model, 'is_nav')->dropDownList(\funson86\cms\models\YesNo::labels()) ?>

      <?= $form->field($model, 'banner')->textInput(['maxlength' => 255]) ?>

      <?= $form->field($model, 'keywords')->textInput(['maxlength' => 255]) ?>

      <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

      <?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 255]) ?>

      <?= $form->field($model, 'sort_order')->textInput() ?>

      <?= $form->field($model, 'status')->dropDownList(\common\models\Status::labels()) ?>      
    </fieldset>
    
    <fieldset class="scheduler-border">
      <legend class="scheduler-border">Атрибуты</legend>
      
      <?= \yii\bootstrap\Tabs::widget([
          'items' => [
              [
                  'label' => 'Заполнение полей товаров в категории "' . $model->name . '"',
                  'content' => $this->render('/product/partials/fields', ['form' => $form, 'model' => $model]),
                  'active' => true
              ],
              [
                  'label' => 'Конструирование',
                  'content' => mirocow\eav\admin\widgets\Fields::widget([
                      'model' => $model,
                      'entityModel' => 'common\models\Product',
                  ]),
                  'active' => false
              ],              
              
              /*[
                  'label' => 'Конструирование',
                  'content' => $this->render('@mirocow/eav/admin/widgets/views/fields', [
                            'uri' => \yii\helpers\Url::to(['eav/admin/ajax/index']),
                           ]),
                  'active' => false
              ],*/              
              
              /*[
                  'label' => 'Конструирование',
                  'content' => $this->render('@mirocow/eav/admin/views/modal/index'),
                  //'headerOptions' => [],
                  //'options' => ['id' => 'myveryownID'],
              ],*/
              /*[
                  'label' => 'Example',
                  'url' => 'http://www.example.com',
              ],*/
              /*[
                  'label' => 'Настройки',
                  'items' => [
                       [
                           'label' => 'Конструирование',
                           'content' => $this->render('@mirocow/eav/admin/widgets/views/fields', [
                            'uri' => \yii\helpers\Url::to(['eav/admin/ajax/index']),
                           ]),
                       ],
                       /*[
                           'label' => 'DropdownB',
                           'content' => 'DropdownB, Anim pariatur cliche...',
                       ],*
                  ],
              ],*/
          ],
      ]);?>      
      
    </fieldset>

    <div class="form-group">
        <label class="col-lg-2 control-label" for="">&nbsp;</label>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
/*$js_form_builder =<<<JS

JS;

$this->registerJs($js_form_builder, yii\web\View::POS_READY, 'js_tab');*/
?>