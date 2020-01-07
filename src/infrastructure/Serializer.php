<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure;

use tabler\application\entities\places\Place;
use tabler\application\entities\posts\PostsCollection;
use tabler\application\entities\users\User;
use tabler\interfaces\api\views\PlaceView;
use tabler\interfaces\api\views\PostView;
use tabler\interfaces\api\views\UserView;

class Serializer extends \yii\rest\Serializer
{
	public function serialize($data)
	{
		if ($data instanceof PostsCollection) {
			return $this->serializePosts($data);
		} elseif ($data instanceof User) {
			$handler = new UserView();
			return $handler($data);
		} elseif ($data instanceof Place) {
			$handler = new PlaceView();
			return $handler($data);
		}
		
		return parent::serialize($data);
	}

	protected function serializePosts(PostsCollection $entities)
	{
		$handler = new PostView();
		
		$posts = [];
		foreach ($entities as $entity) {
			/** @var $entity Post */
			$posts[] = $handler($entity);
		}
		
		return [
			'status' => 'Success',
			'message' => 'Успешно',
			'data' => [
				'posts' => $posts
			]
		];
	}
	
}