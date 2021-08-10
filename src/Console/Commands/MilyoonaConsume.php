<?php

namespace Milyoona\MicroserviceSdk\Console\Commands;

use Bschmitt\Amqp\Facades\Amqp;
use Illuminate\Console\Command;

class MilyoonaConsume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'milyoona:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Milyoona Model Consumer Command';

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
        Amqp::consume(config('consumer.queue_name'), function ($message, $resolver) {

            $routingKey = $message->delivery_info['routing_key'];
            $method = json_decode($message->body, true)['method'];
            $data = json_decode($message->body, true)['data'];

            if (!isBase($routingKey)) {
                consumerCrud($routingKey, $method, $data);
            } else {
                $consumer_log = new \Milyoona\MicroserviceSdk\Models\ConsumerLog;
                $consumer_log->queue = config('consumer.queue_name');
                $consumer_log->model = config('consumer.models')[$routingKey];
                $consumer_log->method = $method;
                $consumer_log->data = $data;
                $consumer_log->save();
            }

            $resolver->acknowledge($message);
        }, [
                'routing' => getMigrations(),
                'persistent' => true
        ]);
    }
}
