<?php

if (!function_exists("datatable_attribute")) {
    /**
     * @param $attribute
     * @return int|string
     */
    function datatable_attribute($attribute)
    {
        switch (true) {
            case (is_bool($attribute)):
                $result = ($attribute) ? 'true' : 'false';
                break;

            case (is_numeric($attribute)):
                $result = $attribute;
                break;

            case (is_array($attribute)):
                $result = json_encode($attribute);
                break;

            default:
                $result = "\"{$attribute}\"";
        }

        return $result;
    }
}

if (!function_exists("html_attributes")) {
    /**
     * @param array $attributes
     * @return string
     */
    function html_attributes($attributes = array())
    {
        $output = "";

        if ($attributes) {
            foreach ($attributes as $attr => $value) {
                if ($attr && $value) {
                    $output .= "{$attr}=\"{$value}\" ";
                }
            }
        }

        return $output;
    }
}
