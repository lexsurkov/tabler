<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\places;

use tabler\application\entities\places\PlacesQuery;
use yii\mongodb\ActiveQuery;

class YiiPlacesQuery extends ActiveQuery implements PlacesQuery
{
	
	/** @inheritdoc */
	public function byId($id)
	{
		return $this->where(['_id' => $id]);
	}
	
}