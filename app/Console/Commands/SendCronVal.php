<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Crontest;
use Illuminate\Support\Facades\DB;

class SendCronVal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-cron-val';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stores value to cron table value field';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
       /* DB::table('crontests')->insert(['cronval'=>now()]);        */
       $c=new Crontest;
        $c->cronval=now();
        $c->save();
    }
}
