
<?php if (count($data)) { ?>
    <?php foreach ($data as $item) { ?>
    <dl>
        <dt>
            <div class="col-sm-2">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Пользователь</strong> <span class="text-muted"><?= Yii::$app->formatter->asDatetime($item->created_at, 'dd.mm.y') ?></span>
                    </div>
                    <div class="panel-body">
                        <?= $item->question ?>
                    </div><!-- /panel-body -->
                </div><!-- /panel panel-default -->
            </div><!-- /col-sm-5 -->

        </dt>
        <dd>
            <div class="clearfix"></div>
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Менеджер</strong> <span class="text-muted"><?= Yii::$app->formatter->asDatetime($item->created_at, 'dd.mm.y') ?></span>
                    </div>
                    <div class="panel-body">
                        <p><?= $item->answer ?></p>
                    </div><!-- /panel-body -->
                </div><!-- /panel panel-default -->
            </div><!-- /col-sm-5 -->
            <div class="col-sm-2">
                <div class="thumbnail">
                    <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

        </dd>
    </dl>
    <?php } ?>
<?php } ?>

<div class="pagination-right">
    <?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
</div>
