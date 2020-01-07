<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities;

use ArrayIterator;
use IteratorAggregate;

abstract class EntitiesCollection implements IteratorAggregate
{
	/**
	 * @var array
	 */
	private $entities;
	
	/**
	 * EntitiesCollection constructor.
	 *
	 * @param array $entities
	 */
	public function __construct(array $entities)
	{
		$this->entities = $entities;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getIterator(): ArrayIterator
	{
		return new ArrayIterator($this->entities);
	}
	
}