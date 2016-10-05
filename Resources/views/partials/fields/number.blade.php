<div class='form-group'>
    {!! Form::label($settingName, $moduleInfo['description']) !!}
    @if(isset($data['db_settings'][$settingName]))
    {!! Form::input('number', $settingName, old($settingName, $data['db_settings'][$settingName]->value), ['class' => 'form-control', 'placeholder' => trans($moduleInfo['description'])]) !!}
    @else
    {!! Form::input('number', $settingName, old($settingName), ['class' => 'form-control', 'placeholder' => $moduleInfo['description']]) !!}
    @endif
    @if (!empty($moduleInfo['hint']))
    <p class="help-block">{{$moduleInfo['hint']}}</p>
    @endif
</div>
