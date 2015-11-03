<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
?>

<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <?php /*
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
                </div>
                <div class="info">
                    Sean Ngu
                    <small>Front end developer</small>
                </div>
            </li>
        </ul>
        */ ?>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <?php

        $menuItemsMain = [
            [
                'label' => '<i class="fa fa-shopping-cart"></i> Заказы',
                'url' => ['#'],
                'active' => true,
                'items' => [
                    [
                        'label' => 'Активные заказы',
                        'url' => ['/order'],
                    ],
                    [
                        'label' => 'История заказов',
                        'url' => ['/order-log'],
                    ],
                    [
                        'label' => 'Корзины',
                        'url' => ['/cart'],
                    ],
                ],
                //'visible' => Yii::$app->user->can('readPost'),
            ],
            [
                'label' => '<i class="fa fa-gift"></i> Продукты',
                'url' => ['#'],
                'active' => false,
                'items' => [
                    [
                        'label' => 'Список категории',
                        'url' => ['/category'],
                    ],
                    [
                        'label' => 'Список товаров',
                        'url' => ['/product'],
                    ],

                    [
                        'label' => 'Коментарии',
                        'url' => ['/comment'],
                    ],
                    [
                        'label' => 'Вопрос - ответ',
                        'url' => ['/consultation'],
                    ],
                    [
                        'label' => 'Бренды',
                        'url' => ['/brand'],
                    ],
                    [
                        'label' => 'История поиска',
                        'url' => ['/search-log'],
                    ],
                    [
                        'label' => 'Импорт',
                        'url' => ['/product/import'],
                    ],
                    [
                        'label' => 'Экспорт',
                        'url' => ['/product/export'],
                    ],
                ],
                //'visible' => Yii::$app->user->can('readPost'),
            ],
            [
                'label' => '<i class="fa fa-user"></i> Пользователи',
                'url' => ['#'],
                'active' => false,
                //'visible' => Yii::$app->user->can('haha'),
                'items' => [
                    [
                        'label' => '<i class="fa fa-user"></i> ' . Yii::t('app', 'User'),
                        'url' => ['/user'],
                    ],
                    [
                        'label' => '<i class="fa fa-lock"></i> ' . Yii::t('app', 'Address'),
                        'url' => ['/address'],
                    ],
                    [
                        'label' => '<i class="fa fa-lock"></i> ' . Yii::t('app', 'Favorite'),
                        'url' => ['/favorite'],
                    ],
                    [
                        'label' => '<i class="fa fa-lock"></i> ' . Yii::t('app', 'Point Log'),
                        'url' => ['/point-log'],
                    ],
                    [
                        'label' => '<i class="fa fa-lock"></i> ' . Yii::t('app', 'Coupon Type'),
                        'url' => ['/coupon-type'],
                    ],
                    [
                        'label' => '<i class="fa fa-lock"></i> ' . Yii::t('app', 'Coupon'),
                        'url' => ['/coupon'],
                    ],
                ],
            ],
            [
                'label' => '<i class="fa fa-file-o"></i> Страницы',
                'url' => ['#'],
                'active' => false,
                'items' => [
                    [
                        'label' => '<i class="fa fa-user"></i> ' . Yii::t('app', 'Cms Catalog'),
                        'url' => ['/cms/cms-catalog'],
                    ],
                    [
                        'label' => '<i class="fa fa-lock"></i> ' . Yii::t('app', 'Cms Show'),
                        'url' => ['/cms/cms-show'],
                    ],
                ],
            ],
            [
                'label' => '<i class="fa fa-cog"></i> ' . Yii::t('app', 'Настройки'),
                'url' => ['#'],
                'active' => false,
                //'visible' => Yii::$app->user->can('haha'),
                'items' => [
                    [
                        'label' => 'Оплата',
                        'url' => ['/payment'],
                    ],
                    [
                        'label' => 'Доставка',
                        'url' => ['/shipment'],
                    ],
                    [
                        'label' => 'Роли',
                        'url' => ['/auth'],
                    ],
                    [
                        'label' => 'Конструктор атрибутов',
                        'url' => ['/eav'],
                    ],
                    [
                        'label' => 'Настройки',
                        'url' => ['/setting'],
                    ],
                    [
                        'label' => 'Регионы',
                        'url' => ['/region'],
                    ],
                ],
            ],
        ];


        ?>

        <ul class="nav">
            <?php foreach($menuItemsMain as $menu): ?>
                <?php if(isset($menu['items'])):?>
                <li class="has-sub ">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <?=$menu['label']?>
                    </a>
                    <ul class="sub-menu">
                        <?php foreach($menu['items'] as $sub_menu):?>
                            <li><a href="<?=Url::to($sub_menu['url'])?>"><?=$sub_menu['label']?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php else:?>
                    <?php if(is_array($menu)):?>
                        <li><a href="<?=Url::to($menu['url'])?>"> <span><?=$menu['label']?></span></a></li>
                    <?php else:?>
                        <?=$menu; ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>



        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
