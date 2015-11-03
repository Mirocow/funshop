<?php
use yii\helpers\Url;
?>
<h2>Каталог</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <?php foreach ($allCategory as $category): ?>
        <?php if ($category['parent_id'] == 0): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="<?=Url::to(['category/view', 'id'=>$category['id']])?>"><?=$category['name']?> </a>
                        <a data-toggle="collapse" data-parent="#accordian" href="#sub-<?=$category['id']?>"><span class="pull-right"><i class="fa fa-plus"></i></span>
                    </h4>
                </div>
                <div id="sub-<?=$category['id']?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <?php foreach ($allCategory as $subcategory): ?>
                                <?php if ($subcategory['parent_id'] == $category['id']): ?>
                                    <li><a href="<?=Url::to(['category/view', 'id'=>$subcategory['id']])?>"><?=$subcategory['name']?> </a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<!--/category-products-->
