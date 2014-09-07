<?php
/**
 * Author: Eugine Terentev <eugine@terentev.net>
 */

namespace trntv\arrayinput;

class ArrayInputAsset extends \yii\web\AssetBundle{

    public function init(){
        $this->sourcePath = __DIR__ . '/assets';
        parent::init();
    }

    public $js = [
        'js/array-input.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
} 