<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application;

use RuntimeException;
use Throwable;

class FieldRequiredException extends RuntimeException
{
	/** @var array */
	private $fields;
	
	public function __construct(array $fields, string $message = '', int $code = 0, Throwable $previous = null)
	{
		$this->fields = $fields;
		if (empty($message)) {
			$message = 'Поле не может быть пустым';
		}
		parent::__construct($message, $code, $previous);
	}
	
	public function getFields(): array
	{
		return $this->fields ?? [];
	}
	
	public function getName(): string
	{
		return 'FieldRequired';
	}
}