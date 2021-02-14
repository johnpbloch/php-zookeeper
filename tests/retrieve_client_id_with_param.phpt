--TEST--
Get client id should throw error with parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->getClientId(10);
--EXPECTF--
Warning: Zookeeper::getClientId() expects exactly %d parameters, %d given in %s on line %d
