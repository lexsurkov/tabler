<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\places;

use yii\mongodb\ActiveQuery;
use yii\mongodb\ActiveRecord;

/**
 * Class PlacesActiveRecord
 *
 * @property string $_id
 * @property string $name
 * @property string $city
 * @property string $street
 * @property string $category
 
 * @package tabler\infrastructure\places
 */
class PlacesActiveRecord extends ActiveRecord
{
	/** @inheritdoc */
	public static function collectionName()
	{
		return 'places';
	}
	
	public function attributes()
	{
		return [
			'_id',
			'name',
			'city',
			'street',
			'category',
		];
	}
	
	/**
	 * @return ActiveQuery|YiiPlacesQuery
	 */
	public static function find()
	{
		return new YiiPlacesQuery(static::class);
	}
	
}