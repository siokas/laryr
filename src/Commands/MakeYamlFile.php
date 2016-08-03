<?php

namespace Siokas\Laryr\Commands;

use Config;
use File;
use Illuminate\Console\Command;

class MakeYamlFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:yaml
                            {name : The filename of the new yaml file (Without extension)}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new yaml file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = Config::get('laryr.path', base_path());
        $filename = $this->argument('name') . '.yml';
        $fullpath = $path . '/' . $filename;

        // dd($fullpath);

        $contents = "-";

        File::put(base_path() . '/' . $filename, '-');
        $this->info('The file ' . $filename . ' created!');
    }
}
