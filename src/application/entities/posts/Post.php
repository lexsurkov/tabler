<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\posts;

use tabler\application\entities\places\Place;
use tabler\application\entities\users\User;

class Post
{
	/** @var string */
	private $id;
	/** @var Place */
	private $place;
	/** @var User */
	private $user;
	/** @var string */
	private $text;
	/** @var string */
	private $status;
	/** @var integer */
	private $createdAt;
	
	/**
	 * Post constructor.
	 * @param string $id
	 * @param Place $place
	 * @param User $user
	 * @param string $text
	 * @param string $status
	 * @param int $createdAt
	 */
	public function __construct(string $id, Place $place, User $user, string $text, string $status, int $createdAt)
	{
		$this->id = $id;
		$this->place = $place;
		$this->user = $user;
		$this->text = $text;
		$this->status = $status;
		$this->createdAt = $createdAt;
	}
	
	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}
	
	/**
	 * @return Place
	 */
	public function getPlace(): Place
	{
		return $this->place;
	}
	
	/**
	 * @return User
	 */
	public function getUser(): User
	{
		return $this->user;
	}
	
	/**
	 * @return string
	 */
	public function getText(): string
	{
		return $this->text;
	}
	
	/**
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}
	
	/**
	 * @return int
	 */
	public function getCreatedAt(): int
	{
		return $this->createdAt;
	}
	
}