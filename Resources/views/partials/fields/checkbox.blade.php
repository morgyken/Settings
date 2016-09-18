<div class="checkbox">
    <label for="{{ $settingName }}">
        <input id="{{ $settingName }}"
               name="{{ $settingName }}"
               type="checkbox"
               class="flat-blue"
               {{ isset($data['db_settings'][$settingName]) && (bool)$data['db_settings'][$settingName]->value == true ? 'checked' : '' }}
               value="1" />
               {{ $moduleInfo['description'] }}
    </label>
</div>
