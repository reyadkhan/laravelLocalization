<?php

namespace WebApp\Localization\Test;

use Illuminate\Http\Request;
use Orchestra\Testbench\TestCase;
use WebApp\Localization\Middlewares\LocalizationMiddleware;

class LocalizationTest extends TestCase
{
    protected $request;
    protected $middleware;

    /**
     * Initialize setup
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->request = new Request();
        $this->request->headers->set('content-type', 'application/json');
        $this->request->initialize(['lang' => 'fr']);
        $this->middleware = new LocalizationMiddleware();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('localization', [
            'available_locales' => [
                'en', 'fr'
            ],

            'fallback_locale' => 'en',

            'query_var' => 'lang',

            'session_key' => 'webAppLocale'
        ]);
    }

    /**
     * @test
     */
    public function canChangeLocale()
    {
        $this->middleware->handle($this->request, function (){});
        $this->assertEquals('fr', app()->getLocale());
    }

    /**
     * @test
     */
    public function canStoreSession()
    {
        $this->middleware->handle($this->request, function (){});
        $this->assertEquals('fr', session(config('localization')['session_key']));
    }
}