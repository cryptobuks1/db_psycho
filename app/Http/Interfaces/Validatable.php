<?php


namespace App\Http\Interfaces;

interface Validatable
{
    /**
     * Returns validation rules for the model
     * @return array
     */
    public static function getValidationRules();

    /**
     * Returns caption for the given model attribute
     * @param $attr string
     * @return string
     */
    public static function getAttributeCaption($attr);
}