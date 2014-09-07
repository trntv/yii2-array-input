<?php
/**
 * Author: Eugine Terentev <eugine@terentev.net>
 */

namespace trntv\arrayinput;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class ArrayInput extends InputWidget{
    protected $inputOptions;

    public function init(){
        parent::init();
        $this->inputOptions = ArrayHelper::merge([
                'type'=>'text',
                'class'=>'form-control'
            ],
            $this->options
        );
        unset($this->inputOptions['id']);
        ArrayInputAsset::register($this->getView());
        if($this->hasModel()){
            $this->name = Html::getInputName($this->model, $this->attribute);
            $this->value = Html::getAttributeValue($this->model, $this->attribute);
        }
        $this->name = rtrim($this->name, '[]').'[]';
        $this->value = is_array($this->value) ? $this->value : [$this->value];
    }

    public function run(){
        $content = Html::beginTag('div', ['id'=>$this->options['id']]);
        foreach($this->value as $k => $v){
            $this->options['id'] = $this->options['id'].'_'.$k;
            $content .= Html::beginTag('div', ['class'=>'input-group']);
            $content .= Html::input($this->options['type'], $this->name, $v, $this->inputOptions);
            $content .= Html::tag('a', Html::tag('i', '', ['class'=>'glyphicon glyphicon-remove']), ['class'=>'input-group-addon array-input-remove', 'href'=>'#']);
            $content .= Html::endTag('div');
        }
        $content .= Html::beginTag('div', ['class'=>'input-group']);
        $content .= Html::input($this->options['type'], $this->name, null, $this->inputOptions);
        $content .= Html::tag('a', Html::tag('i', '', ['class'=>'glyphicon glyphicon-plus']), ['class'=>'input-group-addon array-input-plus', 'href'=>'#']);
        $content .= Html::endTag('div');
        $content .= Html::endTag('div');
        return $content;
    }
} 