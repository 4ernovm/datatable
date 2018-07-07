<?php

namespace Chernoff\Datatable;

/**
 * Trait ToArrayTrait
 * @package Chernoff\Datatable
 */
trait ToArrayTrait
{
    /**
     * @return array
     */
    public function toArray()
    {
        $refl = new \ReflectionObject($this);
        $result = [];

        foreach ($refl->getProperties() as $property) {
            $name = $property->getName();
            $getter = sprintf("get%s", ucfirst($name));

            if (method_exists($this, $getter)) {
                $value = call_user_func([$this, $getter]);

                if (!is_null($value)) {
                    $result[$name] = $value;
                }
            }
        }

        return $result;
    }
}
