<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use mysqli;

class InstallarAstrosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astros:instalar {--env=}';

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
        $this->info('Tirando sistema do ar');
        system('php artisan down');
        $this->installBase();
        $this->call('migrate');
        system('php artisan astros:atualizar');
        if ($this->option('env') == 'dev') {
            //chama as seeders de criação

            system('php artisan db:seed --class="Database\Seeders\baseFake\DatabaseFakeSeed"');

            $this->info('Base de dados para desenvolvimento criada com sucesso.');
        }
        system('php artisan astros:atualizar');
        $this->info('Colocando sistema do ar');
    }

    public function installBase(){
        $host = config('database.connections.mysql.host');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $database = config('database.connections.mysql.database');
        $conn = new mysqli($host, $username, $password);
        if ($conn->connect_error) {
            throw new Exception("Copnexão não estabelecida", 1);
        }

        $this->line('dropando base ' . $database);

        $sql = 'DROP DATABASE IF EXISTS ' . $database;
        $conn->query($sql);

        $this->line('Criando banco ' . $database);
        $sql = 'CREATE DATABASE ' . $database . ' character set utf8 collate utf8_general_ci';
        $conn->query($sql);
    }
}
