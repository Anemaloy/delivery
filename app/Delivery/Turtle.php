<?php

namespace App\Delivery;

use App\Delivery\Contracts\DeliveryContract;

class Turtle extends AbstractDeliveryPartner implements DeliveryContract
{
    public $slug = 'turtle';

    public $config;

    public $data;

    public $custom_validation_rules = [
        'weight',
        'width',
        'height',
        'deep',
        'count'
    ];

    /**
     * Метод расчета данных
     * @return array|string
     */
    public function calculate()
    {
        if ($this->validateData()) {
            return ['price' => 100500, 'date' => '11.03.1994'];
        }

        return $this->error_description;
    }

    /**
     * Валидация полученных данных (добавляем валидацию по черепашке)
     * @return bool
     */
    public function validateData() :bool
    {
        if (parent::validateData()) {
            foreach ($this->data['elements'] as $element) {
                foreach ($this->custom_validation_rules as $need_field) {
                    if (!isset($element[$need_field])) {
                        $this->setError(null, 'Данные для доставки указаны не верно, пожалуйста, проверьте и попробуйте еще раз');
                        return false;
                    }
                }
            }
            return true;
        }

        return false;
    }
}
