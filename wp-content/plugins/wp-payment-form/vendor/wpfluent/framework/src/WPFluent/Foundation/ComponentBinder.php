<?php

namespace WPPayForm\Framework\Foundation;

use WPPayForm\Framework\View\View;
use WPPayForm\Framework\Http\Router;
use WPPayForm\Framework\Request\Request;
use WPPayForm\Framework\Response\Response;
use WPPayForm\Framework\Database\Orm\Model;
use WPPayForm\Framework\Validator\Validator;
use WPPayForm\Framework\Foundation\Dispatcher;
use WPPayForm\Framework\Foundation\RequestGuard;
use WPPayForm\Framework\Pagination\AbstractPaginator;
use WPPayForm\Framework\Database\ConnectionResolver;
use WPPayForm\Framework\Database\Query\WPDBConnection;
use WPPayForm\Framework\Foundation\UnAuthorizedException;

class ComponentBinder
{
    protected $app = null;

    protected $bindables = [
        'Request',
        'Response',
        'Validator',
        'View',
        'Events',
        'DataBase',
        'Router',
        'Paginator'
    ];

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function bindComponents()
    {
        foreach ($this->bindables as $value) {
            $method = "bind{$value}";
            $this->{$method}();
        }

        $this->extendBindings($this);

        $this->app->resolving(RequestGuard::class, function($request) {
            $request->validate($this->app->make('validator'));
        });
    }

    protected function bindRequest()
    {
        $this->app->singleton(Request::class, function ($app) {
            return new Request($app, $_GET, $_POST, $_FILES);
        });

        $this->app->alias(Request::class, 'request');
    }

    protected function bindResponse()
    {
        $this->app->singleton(Response::class, function($app) {
            return new Response($app);
        });

        $this->app->alias(Response::class, 'response');
    }

    protected function bindValidator()
    {
        $this->app->bind(Validator::class, function($app) {
            return new Validator;
        });

        $this->app->alias(Validator::class, 'validator');
    }

    protected function bindView()
    {
        $this->app->bind(View::class, function($app) {
            return new View($app);
        });

         $this->app->alias(View::class, 'view');
    }

    protected function bindEvents()
    {
        $this->app->singleton(Dispatcher::class, function($app) {
            return new Dispatcher($app);
        });

        $this->app->alias(Dispatcher::class, 'events');
    }

    protected function bindDataBase()
    {
        $this->app->bindShared('db', function($app) {
            return new WPDBConnection(
                $GLOBALS['wpdb'], $app->config->get('database')
            );
        });

        Model::setEventDispatcher($this->app['events']);
        
        Model::setConnectionResolver(new ConnectionResolver);
    }

    protected function bindRouter()
    {
        $this->app->singleton('router', function($app) {
            return new Router($app);
        });
    }

    protected function bindPaginator()
    {
        AbstractPaginator::currentPathResolver(function () {
            return $this->app['request']->url();
        });
        
        AbstractPaginator::currentPageResolver(function ($pageName = 'page') {
            $page = $this->app['request']->get($pageName);

            if (filter_var($page, FILTER_VALIDATE_INT) !== false && (int) $page >= 1) {
                return $page;
            }

            return 1;
        });
    }

    protected function extendBindings($app)
    {
        $bindings = $this->app['path'] . 'boot/bindings.php';

        if (is_readable($bindings)) {
            require_once $bindings;
        }
    }
}
