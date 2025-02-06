<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AtualizarAstrosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astros:atualizar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        system('php artisan config:cache');
        // system('php artisan config:clear');
        $this->info('Tirando sistema do ar');
        system('php artisan down');

        $this->info('rodando migrations');
        system('php artisan migrate');

        $this->info('Atualizando astros');
        system('php artisan db:seed --class="Database\Seeders\DatabaseSeeder"');
        $this->info('Astros atualizado');

        $this->info('Colocando sistema do ar');
        system('php artisan up');
    }
}
