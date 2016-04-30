<?php
namespace Dotapi2\Entity;

use Dotapi2\Collection\CollectionFactory;
use Dotapi2\Exceptions\Exception;

/**
 * Entity Factory
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
class EntityFactory
{

    /**
     * Create a entity from properties
     *
     * @param string $entityType
     * @param array $properties
     *
     * @return Entity
     * @throws \Dotapi2\Exceptions\Exception
     */
    public function create($entityType, array $properties)
    {
        $className = '\Dotapi2\Entity\\' . ucfirst($entityType);
        if (!class_exists($className)) {
            throw new Exception('Entity of type ' . $entityType . ' does not exist.');
        }

        $properties = $this->mapCollections($className, $properties);
        $properties = $this->mapEntities($className, $properties);

        return new $className($properties);
    }

    /**
     * Map child collections
     *
     * @param string $className
     * @param array $properties
     *
     * @return array
     * @throws Exception
     */
    protected function mapCollections($className, array $properties)
    {
        $collectionFactory = new CollectionFactory();
        foreach ($className::$collectionMapping as $property => $collectionType) {
            if (isset($properties[$property]) && is_array($properties[$property])) {
                $properties[$property] = $collectionFactory->create($collectionType, $properties);
            }
        }

        return $properties;
    }

    /**
     * Map child entities
     *
     * @param string $className
     * @param array $properties
     *
     * @return array
     * @throws Exception
     */
    protected function mapEntities($className, array $properties)
    {
        foreach($className::$entityMapping as $property => $entityType) {
            if (isset($properties[$property])) {
                $properties[$property] = $this->create($entityType, (is_array($properties[$property])) ? $properties[$property] : [$properties[$property]]);
            }
        }

        return $properties;
    }

}

