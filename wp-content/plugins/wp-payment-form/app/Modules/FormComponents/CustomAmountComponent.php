<?php

namespace WPPayForm\App\Modules\FormComponents;

use WPPayForm\App\Models\Form;
use WPPayForm\Framework\Support\Arr;

if (!defined('ABSPATH')) {
    exit;
}

class CustomAmountComponent extends BaseComponent
{
    public function __construct()
    {
        parent::__construct('custom_payment_input', 5);
    }

    public function component()
    {
        return array(
            'type' => 'custom_payment_input',
            'editor_title' => 'User Inputed Pay Amount',
            'group' => 'payment',
            'postion_group' => 'payment',
            'is_system_field' => true,
            'is_payment_field' => true,
            'editor_elements' => array(
                'label' => array(
                    'label' => 'Field Label',
                    'type' => 'text',
                    'group' => 'general'
                ),
                'placeholder' => array(
                    'label' => 'Placeholder',
                    'type' => 'text',
                    'group' => 'general'
                ),
                'required' => array(
                    'label' => 'Required',
                    'type' => 'switch',
                    'group' => 'general'
                ),
                'default_value' => array(
                    'label' => 'Default Value',
                    'type' => 'text',
                    'group' => 'general'
                ),
                'min_value' => array(
                    'label' => 'Minimum Value',
                    'type' => 'text',
                    'group' => 'general'
                ),
                'admin_label' => array(
                    'label' => 'Admin Label',
                    'type' => 'text',
                    'group' => 'advanced'
                ),
                'wrapper_class' => array(
                    'label' => 'Field Wrapper CSS Class',
                    'type' => 'text',
                    'group' => 'advanced'
                ),
                'element_class' => array(
                    'label' => 'Input element CSS Class',
                    'type' => 'text',
                    'group' => 'advanced'
                ),
            ),
            'field_options' => array(
                'disable' => false,
                'label' => 'Custom Payment Amount',
                'placeholder' => '',
                'required' => 'no'
            )
        );
    }

    public function render($element, $form, $elements)
    {
        $currencySettings = Form::getCurrencyAndLocale($form->ID);
        $fieldOptions = Arr::get($element, 'field_options', false);
        $disable = Arr::get($fieldOptions, 'disable');

        if (!$fieldOptions || $disable) {
            return;
        }
        $controlClass = $this->elementControlClass($element);
        $inputClass = $this->elementInputClass($element);
        $inputId = 'wpf_input_' . $form->ID . '_' . $element['id'];

        $defaultValue = apply_filters('wppayform/input_default_value', Arr::get($fieldOptions, 'default_value'), $element, $form);


        $attributes = array(
            'data-required' => Arr::get($fieldOptions, 'required'),
            'data-type' => 'input',
            'name' => $element['id'],
            'placeholder' => Arr::get($fieldOptions, 'placeholder'),
            'value' => $defaultValue,
            'type' => 'number',
            'step' => 'any',
            'data-is_custom_price' => 'yes',
            'min' => Arr::get($fieldOptions, 'min_value'),
            'data-price' => 0,
            'id' => $inputId,
            'class' => $inputClass . ' wpf_custom_amount wpf_money_amount wpf_payment_item input-prepend'
        );
        if (Arr::get($fieldOptions, 'required') == 'yes') {
            $attributes['required'] = true;
        }
        ?>
        <div data-element_type="<?php echo $this->elementName; ?>"
             class="<?php echo $controlClass; ?>">
            <?php $this->buildLabel($fieldOptions, $form, array('for' => $inputId)); ?>
            <div class="wpf_input_content">
                <div class="wpf_form_item_group">
                    <div class="wpf_input-group-prepend">
                        <div class="wpf_input-group-text wpf_input-group-text-prepend"><?php echo $currencySettings['currency_sign']; ?></div>
                    </div>
                    <input <?php echo $this->builtAttributes($attributes); ?> />
                </div>
            </div>
        </div>
        <?php
    }
}