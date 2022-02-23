<?php

use ClickHouseDB\Client;

require __DIR__ . '/../vendor/autoload.php';

$clusterNodes = require_once __DIR__ . '/cluster-nodes.php';
$database = 'db1';
$tableName = 'orders';
$cluster = 'click_cluster';
$shardKey = 'rand()';

$options = [
    'timeout' => 10,
    'connectTimeout' => 5,
];

echo "Cluster $cluster initialization started\n";
foreach ($clusterNodes as $key => $config) {
    $connection = getConnection($config, $options);

    try {
        $connection->write("CREATE DATABASE IF NOT EXISTS $database");
        $connection->database($database);

        $connection->write("
            CREATE TABLE IF NOT EXISTS $database.$tableName(
                order_id Int64,
                user_id Int64,
                amount Int32,
                comment String,
                created_at DateTime
            )
            ENGINE = ReplicatedMergeTree('/clickhouse/tables/{shard}/$database.$tableName', '{replica}')
            PARTITION BY toYYYYMM(created_at)
            ORDER BY order_id
        ");

        echo "Node " . $key + 1 . " initialized\n";
    } catch (Throwable $throwable) {
        die($throwable->getMessage());
    }
}

$connection = getConnection(array_shift($clusterNodes), $options);

try {
    $connection->write("CREATE DATABASE IF NOT EXISTS $database");
    $connection->database($database);

    $connection->write("
        CREATE TABLE IF NOT EXISTS $database.$tableName(
            order_id Int64,
            user_id Int64,
            amount Int32,
            comment String,
            created_at DateTime
        )
        ENGINE = Distributed($cluster, $database, $tableName, $shardKey)
    ");

    echo "Distributed table is initialized\n";
} catch (Throwable $throwable) {
    die($throwable->getMessage());
}

echo "Cluster $cluster initialized\n";

if (! $connection->ping()) {
    die("Cluster connection failed!");
}

echo "Cluster $cluster is OK";

function getConnection(array $config, array $options = []): Client
{
    $connection = new Client($config);

    $connection->setTimeout($options['timeout'] ?? 10);
    $connection->setConnectTimeOut($options['connectTimeout'] ?? 5);

    return $connection;
}
