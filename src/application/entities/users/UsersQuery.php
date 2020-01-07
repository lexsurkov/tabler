<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\users;

interface UsersQuery
{
	/**
	 * @param $id
	 * @return self
	 */
	public function byId($id);
	
	/**
	 * @param $limit
	 * @return self
	 */
	public function limit($limit);
	
	/**
	 * @param $offset
	 * @return self
	 */
	public function offset($offset);
	
}