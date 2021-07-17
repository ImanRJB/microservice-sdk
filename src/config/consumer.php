<?php

return [
    'all_migrations' => [
        'consumer_logs', 'users',
        'terminals',
        'transactions',
        'products',
        'discounts',
        'ibans',
        'sharings',
        'job_categories',
        'withdraws',
        'dashboard_charts',
        'shaparak_user_requests',
        'shaparak_terminal_requests',
        'shaparak_tax_requests',
        'departments',
        'tickets',
        'ticket_messages',
        'balances',
        'irankishes',
        'withdraw_records'
    ],
    
    /*
     * If a migration is base table of microservice, use a ':' after migration name, e.g. 'users:'
     */
    'publish_migration' => [
        'consumer_logs:',
    ],

    'queue_name' => null, // e.g. 'ml_user'

    // 'routing_key' => 'model'
    'models' => [
        'consumer_logs' => 'ConsumerLog',
        'users' => 'User',
        'products' => 'Product',
        'discounts' => 'Discount',
        'terminals' => 'Terminal',
        'transactions' => 'Transaction',
	    'ibans' => 'Iban',
	    'sharings' => 'Sharing',
	    'job_categories' => 'JobCategory',
	    'withdraws' => 'Withdraw',
	    'dashboard_charts' => 'DashboardChart',
	    'shaparak_user_requests' => 'ShaparakUserRequest',
	    'shaparak_terminal_requests' => 'ShaparakTerminalRequest',
	    'shaparak_tax_requests' => 'ShaparakTaxRequest',
        'departments' => 'Department',
        'tickets' => 'Ticket',
        'tickets_messages' => 'Message',
        'balances' => 'Balance',
        'irankishes' => 'Irankish',
        'withdraw_records' => 'WithdrawRecord'
    ],
];
