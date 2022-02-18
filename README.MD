# Clickhouse cluster test setup
###Nodes:
- 1 Master Node
- 2 Shards, 2 Replicas for each shard
- 1 Zookeeper

###Requirements:
- docker
- docker-compose

###Initialization:

- chmod u+x *.sh
- ./cluster-up.sh - start
- ./cluster-restart.sh - recreate and restart cluster
