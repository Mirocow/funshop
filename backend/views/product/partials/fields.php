<?//=$form->field($model,'test')->dropDownList(['1' => 'Опция 1', '2' => 'Опция 2']); ?>

<?//=$form->field($model,'test', ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput(); ?>

<?//=$form->field($model,'test1', ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput(); ?>

<?//=$form->field($model,'test2', ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput(); ?>

<?//=$form->field($model,'test3', ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput(); ?>

<?//=$form->field($model,'test4', ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput(); ?>

<?//=$form->field($model,'test5', ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput(); ?>

<?php
foreach($model->getEavAttributes()->all() as $attr){
    echo $form->field($model, $attr->name, ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput();
}        
?>