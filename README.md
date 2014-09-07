```
\trntv\arrayinput\ArrayInput::widget([
    'name'=>'input',
    'value'=>'test1',

    //'model'=>$model,
    //'attribute'=>'videos'
])
```
```
$form->field($model, 'videos')->widget(\trntv\arrayinput\ArrayInput::className(),
    [
        'name'=>'input',
        'value'=>'test1',

        //'model'=>$model,
        //'attribute'=>'videos'
    ]
)
```