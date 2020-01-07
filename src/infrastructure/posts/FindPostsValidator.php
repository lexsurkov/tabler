<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure\posts;

use tabler\infrastructure\YiiValidator;

class FindPostsValidator extends YiiValidator
{
	public $userId;
	public $limit;
	public $offset;
	
	public function rules()
	{
		return [
			['userId', 'required'],
			['limit', 'integer'],
			['limit', 'default', 'value' => 20],
			['offset', 'default', 'value' => 0],
		];
	}
	
}