<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\services;

use tabler\application\entities\users\User;
use tabler\application\entities\users\UsersRepository;

class UsersService
{
	/** @var UsersRepository $repository */
	private $repository;
	
	public function __construct(UsersRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function findById($id): User
	{
		$this->repository
			->getActiveQuery()
			->byId($id);
		
		return $this->repository->one();
	}
	
}