--TEST--
Should retrieve false if node not exists
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
var_dump($client->exists('/test'));
--EXPECT--
bool(false)
