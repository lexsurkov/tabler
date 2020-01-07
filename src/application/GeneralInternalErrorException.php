<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application;

use RuntimeException;
use Throwable;

class GeneralInternalErrorException extends RuntimeException
{
	
	public function __construct(string $message = 'Произошла ошибка', int $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
	
	public function getName(): string
	{
		return 'GeneralInternalError';
	}
}