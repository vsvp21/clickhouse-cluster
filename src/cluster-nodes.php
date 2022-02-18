<?php

return [
    'master' => [
        'host' => 'clickhouse-master',
        'port' => '8123',
        'username' => 'user1',
        'password' => '123456',
    ],
    'slaves' => [
        [
            'host' => 'clickhouse-slave-01',
            'port' => '8123',
            'username' => 'user1',
            'password' => '123456',
        ],
        [
            'host' => 'clickhouse-slave-02',
            'port' => '8123',
            'username' => 'user1',
            'password' => '123456',
        ],
        [
            'host' => 'clickhouse-slave-03',
            'port' => '8123',
            'username' => 'user1',
            'password' => '123456',
        ],
        [
            'host' => 'clickhouse-slave-04',
            'port' => '8123',
            'username' => 'user1',
            'password' => '123456',
        ],
    ],
];
