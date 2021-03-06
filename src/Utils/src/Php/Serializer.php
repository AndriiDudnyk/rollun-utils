<?php

/**
 * Zaboy lib (http://zaboy.org/lib/)
 *
 * @copyright  Zaboychenko Andrey
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace rollun\utils\Php;

use Opis\Closure\SerializableClosure;

/**
 *
 *
 * @category   utils
 * @package    zaboy
 * @todo set_error_handler in jsonEncode()
 */
class Serializer
{

    /**
     * @param $value
     * @return string
     */
    public static function phpSerialize($value)
    {

        if (is_resource($value)) {
            throw new \LogicException(
            'Resource can not be Serialize'
            );
        }
        if ($value instanceof \Closure) {
            $object = new SerializableClosure($value);
            return static::phpSerialize($object);
        }
        return serialize($value);
    }

    /**
     * @param $serializedValue
     * @return mixed
     */
    public static function phpUnserialize($serializedValue)
    {
        return unserialize($serializedValue);
    }

}
