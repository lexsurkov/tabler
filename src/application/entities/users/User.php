<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\users;

class User
{
	/** @var string */
	private $id;
	/** @var string */
	private $firstName;
	/** @var string */
	private $secondName;
	
	/**
	 * User constructor.
	 * @param string $id
	 * @param string $firstName
	 * @param string $secondName
	 */
	public function __construct(string $id, string $firstName, string $secondName)
	{
		$this->id = $id;
		$this->firstName = $firstName;
		$this->secondName = $secondName;
	}
	
	/**
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}
	
	/**
	 * @return string
	 */
	public function getFirstName(): string
	{
		return $this->firstName;
	}
	
	/**
	 * @return string
	 */
	public function getSecondName(): string
	{
		return $this->secondName;
	}
	
}