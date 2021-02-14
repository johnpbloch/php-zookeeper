--TEST--
Get state should throw error when define parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
echo $client->getState('a');
--EXPECTF--
Warning: Zookeeper::getState() expects exactly %d parameters, %d given in %s on line %d
