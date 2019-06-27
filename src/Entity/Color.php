<?php


namespace App\Entity;


class Color
{
    public $list;

    public function __construct()
    {
        $this->list = [
            'e83e8c',
            '443ee8',
            'ec1515',
            '1c8d35',
            '070907',
            '82059c'
        ];
    }
}