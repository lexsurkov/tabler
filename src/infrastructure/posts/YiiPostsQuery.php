<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\posts;

use tabler\application\entities\posts\PostsQuery;
use yii\mongodb\ActiveQuery;

class YiiPostsQuery extends ActiveQuery implements PostsQuery
{
	
	/**
	 * Выбрать по пользователю
	 *
	 * @param $userId
	 * @return $this
	 */
	public function byUserId($userId): self
	{
		return $this->where(['userId' => $userId]);
	}

}