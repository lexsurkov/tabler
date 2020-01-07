<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\users;

use yii\mongodb\ActiveQuery;
use yii\mongodb\ActiveRecord;

/**
 * Class UsersActiveRecord
 *
 * @property string $_id
 * @property string $firstName
 * @property string $secondName
 
 * @package tabler\infrastructure\users
 */
class UsersActiveRecord extends ActiveRecord
{
	/** @inheritdoc */
	public static function collectionName()
	{
		return 'users';
	}
	
	public function attributes()
	{
		return [
			'_id',
			'firstName',
			'secondName',
		];
	}
	
	/**
	 * @return ActiveQuery|YiiUsersQuery
	 */
	public static function find()
	{
		return new YiiUsersQuery(static::class);
	}
	
}