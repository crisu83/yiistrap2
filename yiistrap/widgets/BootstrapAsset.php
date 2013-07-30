<?php
/*
 * This file is part of Yiistrap.
 *
 * (c) 2013 Christoffer Niska
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yiistrap\widgets;

use yii\web\AssetBundle;

/**
 * @author Christoffer Niska <christoffer.niska@gmail.com
 * @since 2.0.0
 */
class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@yiistrap/assets/bs-v3.0.0-rc1';
    public $css = array(
        'css/bootstrap.css',
    );
    public $js = array(
        'js/bootstrap.js',
    );
    public $depends = array(
        'yii\web\JqueryAsset',
    );
}