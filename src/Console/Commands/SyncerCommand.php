<?php

namespace App\Console\Commands;

use Bschmitt\Amqp\Facades\Amqp;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Milyoona\MicroserviceSdk\Models\User;

class SyncerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'milyoona:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync database';

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
        foreach (config('consumer.publish_migration') as $table) {
            $table = str_replace(':', '', $table);
            $backup_database = DB::connection('mysql_backup');
            foreach($backup_database->table($table)->get() as $data){
                if (!DB::table($table)->where('id', $data->id)->first()) {
                    DB::table($table)->insert((array) $data);
                }
            }
        }

        $this->info('database has been synced');
    }
}
