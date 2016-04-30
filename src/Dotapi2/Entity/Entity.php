<?php
namespace Dotapi2\Entity;
use Dotapi2\Collection\Collection;

/**
 * Base Entity
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Entities
 */
class Entity
{

    /**
     * @var string[] Maps related entities from properties.
     */
    public static $entityMapping = [];

    /**
     * @var string[] Maps result onto collection types.
     */
    public static $collectionMapping = [];

    /**
     * @var array List of properties for this entity.
     */
    protected $properties = [];

    /**
     * Constructor
     *
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        $this->properties = $properties;
    }

    /**
     * Get a property
     *
     * @param string $property
     * @param string $type
     *
     * @return mixed
     */
    public function getProperty($property, $type = null)
    {
        $value = ($this->hasProperty($property)) ? $this->properties[$property] : null;

        if (!is_null($type) && !is_null($value)) {
            settype($value, $type);
        }

        return $value;
    }

    /**
     * Check if a property exists on this collection
     *
     * @param string $property
     *
     * @return bool
     */
    public function hasProperty($property)
    {
        return isset($this->properties[$property]);
    }

    /**
     * Retrieve internal data as array
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function($value){
            if ($value instanceof Entity || $value instanceof Collection) {
                return $value->toArray();
            }

            return $value;
        }, $this->properties);
    }

}

