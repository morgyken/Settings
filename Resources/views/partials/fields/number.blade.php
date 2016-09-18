<div class='form-group'>
    {!! Form::label($settingName, $moduleInfo['description']) !!}
    <?php if (isset($data['db_settings'][$settingName])): ?>
        {!! Form::input('number', $settingName, old($settingName, $data['db_settings'][$settingName]->value), ['class' => 'form-control', 'placeholder' => trans($moduleInfo['description'])]) !!}
    <?php else: ?>
        {!! Form::input('number', $settingName, old($settingName), ['class' => 'form-control', 'placeholder' => $moduleInfo['description']]) !!}
    <?php endif; ?>
</div>
