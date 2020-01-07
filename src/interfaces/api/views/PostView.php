<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\interfaces\api\views;

use tabler\application\entities\posts\Post;

class PostView
{
	
	/**
	 * @param Post $entity
	 * @return array
	 */
	public function __invoke(Post $entity): array
	{
		$userView = new UserView();
		$placeView = new PlaceView();
		
		return [
			'id' => $entity->getId(),
			'place' => $placeView($entity->getPlace()),
			'user' => $userView($entity->getUser()),
			'text' => $entity->getText(),
			'timePassed' => time() - $entity->getCreatedAt()
		];
	}
	
}