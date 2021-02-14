--TEST--
Test should set debug level with invalid parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->setDebugLevel(array());
--EXPECTF--
Warning: Zookeeper::setDebugLevel() expects parameter %d to be %s, array given in %s on line %d
