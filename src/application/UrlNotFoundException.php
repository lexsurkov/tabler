<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\application;

use RuntimeException;
use Throwable;

class UrlNotFoundException extends RuntimeException
{
	
	public function __construct(string $message = 'URL не найден', int $code = 0, Throwable $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
	
	public function getName(): string
	{
		return 'UrlNotFound';
	}
}