<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\posts;

use yii\mongodb\ActiveQuery;
use yii\mongodb\ActiveRecord;

/**
 * Class PostsActiveRecord
 *
 * @property string $_id,
 * @property string $placeId,
 * @property string $userId,
 * @property string $text,
 * @property string $status,
 * @property int $createdAt
 
 * @package tabler\infrastructure\posts
 */
class PostsActiveRecord extends ActiveRecord
{
	/** @inheritdoc */
	public static function collectionName()
	{
		return 'posts';
	}
	
	public function attributes()
	{
		return [
			'_id',
			'placeId',
			'userId',
			'text',
			'status',
			'createdAt'
		];
	}
	
	/**
	 * @return ActiveQuery|YiiPostsQuery
	 */
	public static function find()
	{
		return new YiiPostsQuery(static::class);
	}
	
}