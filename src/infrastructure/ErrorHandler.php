<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure;

use tabler\application\FieldInvalidException;
use tabler\application\FieldRequiredException;
use tabler\application\GeneralInternalErrorException;
use tabler\application\RecordNotFoundException;
use tabler\application\UrlNotFoundException;
use yii\web\ErrorHandler as YiiErrorHandler;

class ErrorHandler extends YiiErrorHandler
{
	protected function convertExceptionToArray($exception)
	{
		$response = \Yii::$app->getResponse();
		
		if ($exception instanceof FieldRequiredException || $exception instanceof FieldInvalidException) {
			$response->setStatusCode(400);
			
			$array = [
				'status' => $exception->getName(),
				'message' => $exception->getMessage(),
				'data' => [
					'fields' => $exception->getFields()
				]
			];
		} elseif($exception instanceof RecordNotFoundException || $exception instanceof UrlNotFoundException) {
			$response->setStatusCode(404);
			
			$array = [
				'status' => $exception->getName(),
				'message' => $exception->getMessage(),
				'data' => []
			];
		} elseif($exception instanceof GeneralInternalErrorException) {
			$response->setStatusCode(500);
			
			$array = [
				'status' => $exception->getName(),
				'message' => $exception->getMessage(),
				'data' => []
			];
		} else {
			$array = parent::convertExceptionToArray($exception);
		}
		
		return $array;
	}
	
}