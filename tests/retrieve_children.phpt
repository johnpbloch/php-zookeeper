--TEST--
Should retrieve children
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
echo count($client->getChildren('/zookeeper'));
--EXPECTF--
%d
