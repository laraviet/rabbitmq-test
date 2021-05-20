<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProcessMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Message from RabbitMQ';

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
        \Amqp::consume('', function ($message, $resolver) {
            var_dump($message->body);
            $resolver->acknowledge($message);
        }, [
            'routing' => '',
            'exchange' => 'amq.fanout',
            'exchange_type' => 'fanout',
            'queue_force_declare' => true,
            'queue_exclusive' => true,
            'persistent' => true // required if you want to listen forever
        ]);
    }
}
