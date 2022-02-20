<h1>Clickhouse cluster test setup</h1>

<h2>Nodes:</h2>
- 1 Master Node
- 2 Shards, 2 Replicas for each shard
- 1 Zookeeper

<h2>Requirements:</h2>
- docker
- docker-compose

<h2>Initialization:</h2>
- chmod u+x *.sh
- ./cluster-up.sh - start
- ./cluster-restart.sh - recreate and restart cluster
