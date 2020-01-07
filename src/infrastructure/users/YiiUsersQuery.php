<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\users;

use tabler\application\entities\users\UsersQuery;
use yii\mongodb\ActiveQuery;

class YiiUsersQuery extends ActiveQuery implements UsersQuery
{
	
	/** @inheritdoc */
	public function byId($id)
	{
		return $this->where(['_id' => $id]);
	}
	
}