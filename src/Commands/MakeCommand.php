<?php

namespace Laracademy\Commands\Commands;

use Illuminate\Console\Command;

class MakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make';

    protected $availableCommands = [
        'make:auth'         => 'auth',
        'make:controller'   => 'controller',
        'make:command'      => 'command',
        'make:event'        => 'event',
        'make:job'          => 'job',
        'make:listener'     => 'listener',
        'make:mail'         => 'mail',
        'make:middleware'   => 'middleware',
        'make:migration'    => 'migration',
        'make:model'        => 'model',
        'make:notification' => 'notification',
        'make:policy'       => 'policy',
        'make:provider'     => 'provider',
        'make:request'      => 'request',
        'make:seeder'       => 'seeder',
        'make:test'         => 'test',
    ];

    protected $options;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Interactive Make Commands';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->availableCommands = collect($this->availableCommands);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Ask what command
        $command = $this->choice('What command are you running?', $this->availableCommands->keys()->toArray());

        switch($command) {
            case 'make:auth':
                $this->MakeAuth();
                break;

            case 'make:controller':
                $this->makeController();
                break;

            case 'make:command':
                $this->makeCommand();
                break;

            case 'make:event':
                $this->makeEvent();
                break;

            case 'make:job':
                $this->makeJob();
                break;

            case 'make:listener':
                $this->makeListener();
                break;

            case 'make:mail':
                $this->makeMail();
                break;

            case 'make:middleware':
                $this->makeMiddleware();
                break;

            case 'make:migration':
                $this->makeMigration();
                break;

            case 'make:model':
                $this->makeModel();
                break;

            case 'make:notification':
                $this->makeNotification();
                break;

            case 'make:policy':
                $this->makePolicy();
                break;

            case 'make:provider':
                $this->makeProvider();
                break;

            case 'make:request':
                $this->makeRequest();
                break;

            case 'make:seeder':
                $this->makeSeeder();
                break;

            case 'make:test':
                $this->makeTest();
                break;
        }

        $this->call($command, $this->options);
    }

    /**
     * all options for make:auth()
     */
    public function makeAuth()
    {
        // Views Only
        if($this->confirm('Only scaffold the authentication views?')) {
            $this->options['--views'] = '';
        }

        if($this->confirm('Overwrite existing views by default')) {
            $this->options['--force'] = '';
        }
    }

    /**
     * all options for make:controller
     */
    public function makeController()
    {
        $this->options['name'] = $this->ask('Controller Name (Example: MyController)');

        // Resourceful Controller
        if($this->confirm('Is this controller resourceful?')) {
            $this->options['--resource'] = '';
        }

        // Model Controller
        if($this->confirm('Would you like to use route model binding?')) {
            $this->options['--model'] = $this->ask('Please enter the name of the model');
        }
    }

    /**
     * all options for make:command
     */
    public function makeCommand()
    {
        $this->options['name'] = $this->ask('Command Name (Example: MyCommand)');

        // Command Name
        $this->options['--command'] = $this->ask('Please enter the command name', 'command:name');
    }

    /**
     * all options for make:event
     */
    public function makeEvent()
    {
        $this->options['name'] = $this->ask('Event Name (Example: MyEvent)');
    }

    /**
     * all options for make:job
     */
    public function makeJob()
    {
        $this->options['name'] = $this->ask('Job Name (Example: MyJob)');

        // Synchronous
        if($this->confirm('Is this job synchronos?')) {
            $this->options['--sync'] = '';
        }
    }

    /**
     * all options for make:listener
     */
    public function makeListener()
    {
        $this->options['name'] = $this->ask('Listener Name (Example: MyListener)');

        if($this->confirm('Do you know the event to listen for?')) {
            $this->options['--event'] = $this->ask('The event class being listened for', '');
        }

        if($this->confirm('Will this event be queued')) {
            $this->options['--queued'] = '';
        }
    }

    /**
     * all options for make:mail
     */
    public function makeMail()
    {
        $this->options['name'] = $this->ask('Mail Name (Example: MyMail)');

        if($this->confirm('Would you like to create a template for this mail command?')) {
            $this->options['--markdown'] = strtolower($this->options['name']);
        }
    }

    /**
     * all options for make:middleware
     */
    public function makeMiddleware()
    {
        $this->options['name'] = $this->ask('Middleware Name (Example: MyMiddlware)');
    }

    /**
     * all options for make:migration
     */
    public function makeMigration()
    {
        $tableName = $this->ask('Table Name (Example: users)');

        if($this->confirm('Are you creating a new table')) {
            $this->options['--create'] = $this->options['name'];

            $this->options['name'] = 'create_'. $tableName .'_table';
        } else {
            $this->options['--table'] = $this->options['name'];

            $this->options['name'] = $this->ask('Migration Name (Example: alter_user_table_add_column_is_admin)', 'alter_'. $tableName .'_table_'. rand(0,100));
        }

        if(! $this->confirm('Use default migration folder?', 'yes')) {
            $this->options['path'] = $this->ask('Path for Migration');
        }
    }

    /**
     * all options for make:model
     */
    public function makeModel()
    {
        $this->options['name'] = $this->ask('Model Name (Example: Posts)');

        if($this->confirm('Do you want to make a migration for this model?')) {
            $this->options['--migration'] = '';
        }

        if($this->confirm('Do you want to make a controller for this model?')) {
            $this->options['--controller'] = '';

            if($this->confirm('Is this controller a resourceful controller?')) {
                $this->options['--resource'] = '';
            }
        }
    }

    /**
     * all options for make:notification
     */
    public function makeNotification()
    {
        $this->options['name'] = $this->ask('Notification Name (Example: MyNotification)');

        if($this->confirm('Would you like to create a template for this notification command?')) {
            $this->options['--markdown'] = strtolower($this->options['name']);
        }
    }

    /**
     * all options for make:policy
     */
    public function makePolicy()
    {
        $this->options['name'] = $this->ask('Policy Name (Example: MyPolicy)');

        if($this->confirm('Will this policy apply to a model')) {
            $this->options['--model'] = $this->ask('Model class name');
        }
    }

    /**
     * all options for make:provider
     */
    public function makeProvider()
    {
        $this->options['name'] = $this->ask('Provider Name (Example: MyProvider)');
    }

    /**
     * all options for make:request
     */
    public function makeRequest()
    {
        $this->options['name'] = $this->ask('Request Name (Example: MyRequest)');
    }

    /**
     * all options for make:seeder
     */
    public function makeSeeder()
    {
        $this->options['name'] = $this->ask('Seeder Name (Example: MySeeder)');
    }

    /**
     * all options for make:test
     */
    public function makeTest()
    {
        $this->options['name'] = $this->ask('Test Name (Example: MyTest)');

        if($this->confirm('Is this test a Unit test?')) {
            $this->options['--unit'] = '';
        }
    }
}
