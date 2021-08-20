<?php

namespace App\Delivery\Contracts;

interface DeliveryContract
{
    /**
     * Метод расчета данных
     * @return array|string
     */
    public function calculate();

    /**
     * Валидация полученных данных
     * @return bool
     */
    public function validateData() :bool;
}
