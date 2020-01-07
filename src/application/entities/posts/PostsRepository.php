<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\posts;

interface PostsRepository
{
	/**
	 * @return PostsQuery
	 */
	public function getActiveQuery();
	public function search();
}