<div class='form-group'>
    {!! Form::label($settingName, trans($moduleInfo['description'])) !!}
    <?php if (isset($data['db_settings'][$settingName])): ?>
        {!! Form::textarea($settingName, old($settingName, $data['db_settings'][$settingName]->value), ['class' => 'form-control','rows'=>3, 'placeholder' => trans($moduleInfo['description'])]) !!}
    <?php else: ?>
        {!! Form::textarea($settingName, old($settingName), ['class' => 'form-control','rows'=>3, 'placeholder' => trans($moduleInfo['description'])]) !!}
    <?php endif; ?>
    @if (!empty($moduleInfo['hint']))
    <p class="help-block">{{$moduleInfo['hint']}}</p>
    @endif
</div>
