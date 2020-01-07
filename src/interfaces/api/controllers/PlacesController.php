<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\interfaces\api\controllers;

use tabler\application\services\PlacesService;

class PlacesController extends BaseController
{
	
	public function actionIndex($id)
	{
		/** @var PlacesService $service */
		$service = \Yii::$container->get(PlacesService::class);
		
		return $service->findById($id);
		
	}
}
