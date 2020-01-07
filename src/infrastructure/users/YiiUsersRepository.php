<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\users;

use tabler\application\entities\users\User;
use tabler\application\entities\users\UsersRepository;
use tabler\application\RecordNotFoundException;
use yii\mongodb\ActiveQuery;

/**
 * Class YiiUsersRepository
 * @package tabler\infrastructure\users
 */
class YiiUsersRepository implements UsersRepository
{
	/** @var YiiUsersQuery */
	private $query;
	
	public function __construct()
	{
		$this->query = UsersActiveRecord::find();
	}
	
	/**
	 * @return YiiUsersQuery|ActiveQuery
	 */
	public function getActiveQuery()
	{
		return $this->query;
	}
	
	public function one()
	{
		$model = $this->query->one();
		
		if (!$model) {
			throw new RecordNotFoundException();
		}
		
		return $this->buildEntity($model);
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
	
	private function buildEntity(UsersActiveRecord $model)
	{
		return new User(
			$model->_id,
			$model->firstName,
			$model->secondName
		);
	}
}