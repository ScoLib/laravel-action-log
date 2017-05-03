<?php

namespace Sco\ActionLog;


use Orchestra\Testbench\TestCase;

class FactoryTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        //$this->artisan('migrate', ['--database' => 'mysql']);
    }


    protected function getPackageProviders()
    {
        return [
            \Sco\ActionLog\LaravelServiceProvider::class
        ];
    }

    public function testInfo()
    {
        //$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        //$this->loadLaravelMigrations('mysql');

        $logInfo = new LogInfo([
            'type'      => 'test',
            'content'   => 'test content',
            'client_ip' => '127.0.0.1',
            'client'    => 'user agent',
            'user_id'   => 1,
        ]);
        $this->assertEquals(Factory::info($logInfo));
    }
}
