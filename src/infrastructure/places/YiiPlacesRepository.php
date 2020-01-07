<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\places;

use tabler\application\entities\places\Place;
use tabler\application\entities\places\PlacesRepository;
use tabler\application\RecordNotFoundException;
use yii\mongodb\ActiveQuery;

/**
 * Class YiiPlacesRepository
 * @package tabler\infrastructure\places
 */
class YiiPlacesRepository implements PlacesRepository
{
	/** @var YiiPlacesQuery */
	private $query;
	
	public function __construct()
	{
		$this->query = PlacesActiveRecord::find();
	}
	
	/**
	 * @return YiiPlacesQuery|ActiveQuery
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
	
	private function buildEntity(PlacesActiveRecord $model)
	{
		return new Place(
			$model->_id,
			$model->name,
			$model->city,
			$model->street,
			$model->category
		);
	}
}