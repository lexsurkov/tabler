<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\interfaces\api\controllers;

use tabler\infrastructure\Serializer;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\Controller;
use yii\web\Response;

abstract class BaseController extends Controller
{
	/** @inheritdoc */
	public function init()
	{
		$this->enableCsrfValidation = false;
		$this->serializer = Serializer::class;
		parent::init();
	}
	
	/**
     * {@inheritdoc}
     */
    public function behaviors()
    {
		return [
			'corsFilter' => [
				'class' => Cors::class,
				'cors' => [
					'Origin' => ['*'],
					'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
					'Access-Control-Request-Headers' => ['Content-Type'],
					'Access-Control-Allow-Credentials' => true,
				],
			],
			'contentNegotiator' => [
				'class' => ContentNegotiator::class,
				'formats' => [
					'application/json' => Response::FORMAT_JSON,
				],
			],
		];
    }

}
