<div class="checkbox">
    <?php foreach ($moduleInfo['options'] as $value => $optionName): ?>
        <label for="{{ $optionName }}">
            <input id="{{ $optionName }}"
                   name="{{ $settingName }}"
                   type="radio"
                   class="flat-blue"
                   {{ isset($data['db_settings'][$settingName]) && (bool)$data['db_settings'][$settingName]->value == $value ? 'checked' : '' }}
                   value="{{ $value }}" />
                   {{ trans($optionName) }}
        </label>
    <?php endforeach; ?>
</div>
