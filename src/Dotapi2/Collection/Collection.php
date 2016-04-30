<?php
namespace Dotapi2\Collection;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Closure;
use Dotapi2\Exceptions\Exception;
use Dotapi2\Entity\Entity;

/**
 * Dotapi2 Collection
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Collection
 */
class Collection implements ArrayAccess, Countable, IteratorAggregate
{

    /**
     * @var string The property index that should be converted to an entity.
     */
    public static $entityIndex;

    /**
     * @var string The type of entity that should be used.
     */
    public static $entityType;

    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @var array
     */
    protected $properties = [];

    /**
     * Constructor
     *
     * @param Entity[] $entities
     * @param array $properties
     */
    public function __construct(array $entities = [], array $properties = [])
    {
        $this->properties = $properties;
        $this->entities = array_filter($entities, function ($entity) {
            return ($entity instanceof Entity);
        });
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
     * Check if collection contains a subset of a full API result.
     *
     * @return bool
     */
    public function isPaginated()
    {
        return $this->hasProperty('results_remaining');
    }

    /**
     * Get remaining amount of results
     *
     * @return int
     */
    public function getRemainingResults()
    {
        return $this->getProperty('results_remaining', 'int');
    }

    /**
     * Get total amount of results
     *
     * @return int
     */
    public function getTotalResults()
    {
        return $this->getProperty('total_results', 'int');
    }

    /**
     * Sort the collection
     *
     * @param Closure $closure
     *
     * @return $this
     */
    public function sort(Closure $closure)
    {
        usort($this->entities, $closure);
        return $this;
    }

    /**
     * Filters the collection and returns a base collection with the results.
     *
     * @param Closure $closure
     *
     * @return Collection
     */
    public function filter(Closure $closure)
    {
        return new Collection(array_filter($this->entities, $closure));
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->entities);
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->entities);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->entities[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return ($this->offsetExists($offset)) ? $this->entities[$offset] : null;
    }

    /**
     * Add an entity to the collection
     *
     * @param mixed $offset
     * @param mixed $value
     * @throws Exception
     */
    public function offsetSet($offset, $value)
    {
        throw new Exception("Cannot mutate collection.");
    }

    /**
     * Remove an entity from the collection
     *
     * @param mixed $offset
     * @throws Exception
     */
    public function offsetUnset($offset)
    {
        throw new Exception("Cannot mutate collection.");
    }

    /**
     * Get the first entity.
     *
     * @return Entity|null
     */
    public function first()
    {
        return ($this->count() > 0) ? current($this->entities) : null;
    }

    /**
     * Get the internal entity array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function(Entity $entity){
            return $entity->toArray();
        }, $this->entities);
    }

}

