<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\users;

interface UsersRepository
{
	/**
	 * @return UsersQuery
	 */
	public function getActiveQuery();
	
	public function one();
	
	public function search();
}