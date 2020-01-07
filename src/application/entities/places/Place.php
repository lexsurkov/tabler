<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application\entities\places;

class Place
{
	/** @var string */
	private $id;
	/** @var string */
	private $name;
	/** @var string */
	private $city;
	/** @var string */
	private $street;
	/** @var string */
	private $category;
	
	/**
	 * Place constructor.
	 * @param string $id
	 * @param string $name
	 * @param string $city
	 * @param string $street
	 * @param string $category
	 */
	public function __construct(string $id, string $name, string $city, string $street, string $category)
	{
		$this->id = $id;
		$this->name = $name;
		$this->city = $city;
		$this->street = $street;
		$this->category = $category;
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
	public function getName(): string
	{
		return $this->name;
	}
	
	/**
	 * @return string
	 */
	public function getCity(): string
	{
		return $this->city;
	}
	
	/**
	 * @return string
	 */
	public function getStreet(): string
	{
		return $this->street;
	}
	
	/**
	 * @return string
	 */
	public function getCategory(): string
	{
		return $this->category;
	}
	
}