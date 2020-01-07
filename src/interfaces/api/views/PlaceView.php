<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\interfaces\api\views;

use tabler\application\entities\places\Place;

class PlaceView
{
	
	/**
	 * @param Place $entity
	 * @return array
	 */
	public function __invoke(Place $entity): array
	{
		
		return [
			'id' => $entity->getId(),
			'name' => $entity->getName(),
			'city' => $entity->getCity(),
			'street' => $entity->getStreet(),
			'category' => $entity->getCategory(),
		];
	}
	
}