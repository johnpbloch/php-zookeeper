--TEST--
Should throw error when create node with invalid parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->create('/test5', array());
--EXPECTF--
Warning: Zookeeper::create() expects parameter 2 to be string, array given in %s on line %d
