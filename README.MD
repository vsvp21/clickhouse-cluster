<h1>Clickhouse cluster test setup</h1>

<h2>Nodes:</h2>
<ul>
    <li>1 Master Node</li>
    <li>2 Shards, 2 Replicas for each shard</li>
    <li>1 Zookeeper</li>
</ul>

<h2>Requirements:</h2>
<ul>
    <li>docker</li>
    <li>docker-compose</li>
</ul>

<h2>Initialization:</h2>
<ul>
    <li>chmod u+x *.sh</li>
    <li>./cluster-up.sh - start</li>
    <li>./cluster-restart.sh - recreate and restart cluster</li>
</ul>
