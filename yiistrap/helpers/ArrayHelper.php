<?php
/*
 * This file is part of Yiistrap.
 *
 * (c) 2013 Christoffer Niska
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yiistrap\helpers;

/**
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @since 2.0.0
 */
class ArrayHelper extends \yii\helpers\ArrayHelper
{
    /**
     * Removes and returns a specific value from the given array (or the default value if not set).
     * @param mixed $array the array to pop the item from.
     * @param string $key the item key.
     * @param mixed $default the default value.
     * @return mixed the value.
     */
    public static function popValue(&$array, $key, $default = null)
    {
        $value = self::getValue($array, $key, $default);
        if (is_array($array)) {
            unset($array[$key]);
        } else {
            unset($array->$key);
        }
        return $value;
    }

    /**
     * Sets the default value for a specific key in the given array.
     * @param mixed $array the array to set value for.
     * @param string $key the item key.
     * @param mixed $value the default value.
     */
    public static function defaultValue(&$array, $key, $value)
    {
        if (is_array($array)) {
            if (!isset($array[$key])) {
                $array[$key] = $value;
            }
        } else {
            if (!isset($array->$key)) {
                $array->$key = $value;
            }
        }
    }

    /**
     * Sets a set of default values for the given array.
     * @param mixed $array the array to set values for.
     * @param array $values the default values.
     */
    public static function defaultValues(&$array, array $values)
    {
        foreach ($values as $name => $value) {
            self::defaultValue($array, $name, $value);
        }
    }

    /**
     * Removes a set of items from the given array.
     * @param array $array the array to remove from.
     * @param array $keys the keys to remove.
     */
    public static function removeValues(array &$array, array $keys)
    {
        foreach ($keys as $key) {
            self::remove($array, $key);
        }
    }

    /**
     * Copies the given values from one array to another.
     * @param array $keys the keys to copy.
     * @param array $from the array to copy from.
     * @param array $to the array to copy to.
     * @param boolean $force whether to allow overriding of existing values.
     * @return array the options.
     */
    public static function copyValues(array $keys, array $from, array $to, $force = false)
    {
        foreach ($keys as $key) {
            if (isset($from[$key])) {
                if ($force || !isset($to[$key])) {
                    $to[$key] = self::getValue($from, $key);
                }
            }
        }
        return $to;
    }

    /**
     * Moves the given values from one array to another.
     * @param array $keys the keys to move.
     * @param array $from the array to move from.
     * @param array $to the array to move to.
     * @param boolean $force whether to allow overriding of existing values.
     * @return array the options.
     */
    public static function moveValues(array $keys, array &$from, array $to, $force = false)
    {
        foreach ($keys as $key) {
            if (isset($from[$key])) {
                $value = self::popValue($from, $key);
                if ($force || !isset($to[$key])) {
                    $to[$key] = $value;
                    self::remove($from, $key);
                }
            }
        }
        return $to;
    }
}
