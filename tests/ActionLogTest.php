<?php

namespace Sco\ActionLog;

use Orchestra\Testbench\TestCase;
use Sco\ActionLog\Events\ManualEvent;

class ActionLogTest extends TestCase
{
    protected function tearDown()
    {
        $this->artisan('migrate:rollback');

        parent::tearDown();
    }

    protected function setUp()
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testbench']);
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'testbench',
            'username'  => 'sco',
            'password'  => 'sco',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ]);

        $app['config']->set('actionlog', [
            'action_logs_table' => 'action_logs',
            'user' => 'App\User',
            'user_foreign_key' => 'user_id',
            'guest' => true,
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            \Sco\ActionLog\LaravelServiceProvider::class
        ];
    }

    public function testInfo()
    {
        $logInfo = new LogInfo([
            'type'      => 'test',
            'content'   => 'test content',
            'client_ip' => '127.0.0.1',
            'client'    => 'user agent',
            'user_id'   => 1,
        ]);
        $this->assertTrue(Factory::info($logInfo));
    }

    public function testManualEvent()
    {
        $res = event(new ManualEvent('manual', ['content' => 'test']));

        $this->assertTrue(is_array($res));
    }
}
