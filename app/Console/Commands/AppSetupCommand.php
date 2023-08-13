<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class AppSetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'setup application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("App setup process started ...");
        $this->line('-----------------------');
        $this->info("Refresh composer autoload files");
        \shell_exec('composer du');
        $this->line("✔");
        $this->line('-----------------------');
        $this->info("Refresh cached configurations");
        $this->call('config:cache');
        $this->line("✔");
        $this->line('-----------------------');
        if ($this->confirm('Refresh all database tables. Do you wish to continue?')) {
            Schema::disableForeignKeyConstraints();
            \shell_exec("composer require laravel/passport -W");
            $this->call("migrate:fresh");
            $this->call("passport:install");
            $this->line("✔");
            $this->line('-----------------------');
        }
        if ($this->confirm('Filling database with dummy data. Do you wish to continue?')) {
            $this->call("db:seed", ['--class' => 'DatabaseSeeder']);
            $this->line("✔");
            $this->line('-----------------------');
        }
        $this->comment("All Done ✔");
    }
}
