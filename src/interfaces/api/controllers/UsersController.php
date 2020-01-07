<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\interfaces\api\controllers;

use tabler\application\services\UsersService;

class UsersController extends BaseController
{
	
	public function actionIndex($id)
	{
		/** @var UsersService $service */
		$service = \Yii::$container->get(UsersService::class);
		
		return $service->findById($id);
		
	}
}
