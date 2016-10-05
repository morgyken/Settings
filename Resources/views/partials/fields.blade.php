@foreach ($settings as $settingName => $moduleInfo)
<?php $fieldView = str_contains($moduleInfo['view'], '::') ? $moduleInfo['view'] : "settings::partials.fields.{$moduleInfo['view']}" ?>
@include($fieldView, [
'settings' => $settings,
'setting' => $settingName,
'moduleInfo' => $moduleInfo,
'settingName' => strtolower($data['current_module']) . '::' . $settingName
])
@endforeach
