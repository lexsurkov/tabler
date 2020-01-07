<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\posts;

interface PostsQuery
{
	/**
	 * @param $userId
	 * @return PostsQuery
	 */
	public function byUserId($userId);
	
	/**
	 * @param $limit
	 * @return PostsQuery
	 */
	public function limit($limit);
	
	/**
	 * @param $offset
	 * @return PostsQuery
	 */
	public function offset($offset);
}