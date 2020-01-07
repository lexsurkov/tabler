<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\interfaces\api\controllers;

use tabler\application\services\PostsService;
use tabler\infrastructure\posts\FindPostsValidator;

class PostsController extends BaseController
{
	
	public function actionIndex()
	{
		$service = \Yii::$container->get(PostsService::class);
		
		return $service->findByParams(
			\Yii::$app->request->getQueryParams(),
			new FindPostsValidator()
		);
	}
	
}
