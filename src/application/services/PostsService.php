<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\services;

use tabler\application\entities\posts\PostsCollection;
use tabler\application\entities\posts\PostsRepository;
use tabler\application\Validator;

class PostsService
{
	/** @var PostsRepository $repository */
	private $repository;
	
	public function __construct(PostsRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function findByParams(array $data, Validator $validator): PostsCollection
	{
		$dto = $validator->handle($data);
		
		$this->repository
			->getActiveQuery()
			->byUserId($dto->userId)
			->limit($dto->limit)
			->offset($dto->offset);
		
		return new PostsCollection($this->repository->search());
	}
	
}