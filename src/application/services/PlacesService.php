<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\services;

use tabler\application\entities\places\Place;
use tabler\application\entities\places\PlacesRepository;

class PlacesService
{
	/** @var PlacesRepository $repository */
	private $repository;
	
	public function __construct(PlacesRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function findById($id): Place
	{
		$this->repository
			->getActiveQuery()
			->byId($id);
		
		return $this->repository->one();
	}
	
}