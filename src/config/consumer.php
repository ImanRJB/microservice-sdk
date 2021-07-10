<?php

return [
    'all_migrations' => [
        'consumer_logs', 'users', 'terminals', 'transactions', 'products'
    ],
    
    /*
     * If a migration is base table of microservice, use a ':' after migration name, e.g. 'users:'
     */
    'publish_migration' => [
        'consumer_logs',
    ],

    'queue_name' => null, // e.g. 'ml_user'

    // 'routing_key' => 'model'
    'models' => [
        'consumer_logs' => 'ConsumerLog',
        'users'          => 'User',
        'products'       => 'Product',
        'terminals'      => 'Terminal',
        'transactions'   => 'Transaction',
    ],
];
