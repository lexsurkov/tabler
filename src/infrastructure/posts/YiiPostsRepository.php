<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\posts;

use tabler\application\entities\posts\Post;
use tabler\application\entities\posts\PostsRepository;
use tabler\application\services\PlacesService;
use tabler\application\services\UsersService;
use yii\mongodb\ActiveQuery;

/**
 * Class YiiPostsRepository
 * @package tabler\infrastructure\posts
 */
class YiiPostsRepository implements PostsRepository
{
	/** @var YiiPostsQuery */
	private $query;
	
	public function __construct()
	{
		$this->query = PostsActiveRecord::find();
	}
	
	/**
	 * @return YiiPostsQuery|ActiveQuery
	 */
	public function getActiveQuery()
	{
		return $this->query;
	}
	
	public function search()
	{
		$models = $this->query->all();
		
		$entities = [];
		
		foreach ($models as $model) {
			$entities[] = $this->buildEntity($model);
		}
		
		return $entities;
	}
	
	private function buildEntity(PostsActiveRecord $model)
	{
		/** @var UsersService $usersService */
		$usersService = \Yii::$container->get(UsersService::class);
		$user = $usersService->findById($model->userId);
		
		/** @var PlacesService $usersService */
		$placesService = \Yii::$container->get(PlacesService::class);
		$place = $placesService->findById($model->placeId);

		return new Post(
			$model->_id,
			$place,
			$user,
			$model->text,
			$model->status,
			$model->createdAt
		);
	}
}