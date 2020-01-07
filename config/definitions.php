<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

use tabler\application\services\PlacesService;
use tabler\application\services\PostsService;
use tabler\application\services\UsersService;
use tabler\infrastructure\places\YiiPlacesRepository;
use tabler\infrastructure\posts\YiiPostsRepository;
use tabler\infrastructure\users\YiiUsersRepository;

return [
	UsersService::class => function() {
		return new UsersService(new YiiUsersRepository());
	},
	PostsService::class => function() {
		return new PostsService(new YiiPostsRepository());
	},
	PlacesService::class => function() {
		return new PlacesService(new YiiPlacesRepository());
	},
];