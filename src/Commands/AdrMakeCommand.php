<?php

namespace BrightComponents\Adr\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class AdrMakeCommand extends Command
{
    /** @var bool */
    protected $action = true;

    /** @var bool */
    protected $responder = true;

    /** @var bool */
    protected $service = true;

    /** @var bool */
    protected $validator = false;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'adr:make {name} {--no-action} {--no-service} {--no-responder}  {--valid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new set of ADR classes.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ADR';

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $this->setOptions();

        $name =$this->argument('name');

        if ($this->action) {
            Artisan::call("adr:action", [
                'name' => $name,
            ]);
        }

        if ($this->service) {
            Artisan::call("adr:service", [
                'name' => $name,
            ]);
        }

        if ($this->responder) {
            Artisan::call("adr:responder", [
                'name' => $name,
            ]);
        }

        if ($this->validator) {
            Artisan::call("adr:validation", [
                'name' => $name,
            ]);
        }

        exit(0);
    }

    /**
     * Set the options for the command.
     *
     * @return void
     */
    protected function setOptions()
    {
        $this->action = ! $this->option('no-action');
        $this->responder = ! $this->option('no-responder');
        $this->service = ! $this->option('no-service');
        $this->validator = $this->option('valid');
    }
}
