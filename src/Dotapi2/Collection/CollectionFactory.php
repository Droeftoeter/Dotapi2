<?php
namespace Dotapi2\Collection;

use Dotapi2\Entity\EntityFactory;
use Dotapi2\Exceptions\Exception;

/**
 * Collection Factory
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
class CollectionFactory
{

    /**
     * Create a collection from properties
     *
     * @param string $collectionType
     * @param array $properties
     *
     * @return Collection
     * @throws Exception
     */
    public function create($collectionType, array $properties)
    {
        $className = '\Dotapi2\Collection\\' . ucfirst($collectionType);
        if (!class_exists($className)) {
            throw new Exception('Collection of type ' . $collectionType . ' does not exist.');
        }

        return new $className($this->extractEntities($className, $properties), $properties);
    }

    /**
     * Extracts entities from a propertySet.
     *
     * @param string $className
     * @param array $properties
     * @return array
     */
    protected function extractEntities($className, array &$properties)
    {
        $entityIndex = $className::$entityIndex;
        $entityType = $className::$entityType;
        $entityFactory = new EntityFactory();

        if (isset($properties[$entityIndex]) && is_array($properties[$entityIndex])) {
            $entities = array_map(function($value) use ($entityFactory, $entityType) {
                return $entityFactory->create($entityType, $value);
            }, $properties[$entityIndex]);

            unset($properties[$entityIndex]);
            return (array)$entities;
        }

        return [];
    }

}

