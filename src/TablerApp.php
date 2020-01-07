<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */
namespace tabler;

use tabler\application\GeneralInternalErrorException;
use tabler\application\UrlNotFoundException;
use yii\base\Exception;
use yii\web\Application as WebApplication;
use yii\console\Application as ConsoleApplication;
use yii\web\NotFoundHttpException;

final class TablerApp
{
	const APP_API = 'api';
	const APP_CONSOLE = 'console';
	
	private $app;
	
	public function __construct(string $name, array $config)
	{
		switch ($name) {
			case self::APP_API:
				$this->app = new WebApplication($config);
				$this->app->controllerNamespace = 'tabler\interfaces\api\controllers';
				break;
			case self::APP_CONSOLE:
				$this->app = new ConsoleApplication($config);
				$this->app->controllerNamespace = 'tabler\interfaces\console\controllers';
				break;
		}
		\Yii::$app->setAliases(['@tabler' => __DIR__]);
	}
	
	public function run()
	{
		try {
			return $this->app->run();
		} catch (NotFoundHttpException $exception) {
			throw new UrlNotFoundException();
		} catch (Exception $exception) {
			throw new GeneralInternalErrorException();
		}
	}
	
}