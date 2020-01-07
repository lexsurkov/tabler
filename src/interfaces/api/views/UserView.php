<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\interfaces\api\views;

use tabler\application\entities\users\User;

class UserView
{
	
	/**
	 * @param User $entity
	 * @return array
	 */
	public function __invoke(User $entity): array
	{
		
		return [
			'id' => $entity->getId(),
			'firstName' => $entity->getFirstName(),
			'secondName' => $entity->getSecondName()
		];
	}
	
}