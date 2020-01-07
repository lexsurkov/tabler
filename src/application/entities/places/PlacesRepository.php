<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\places;

interface PlacesRepository
{
	/**
	 * @return PlacesQuery
	 */
	public function getActiveQuery();
	
	public function one();
	
	public function search();
}