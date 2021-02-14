--TEST--
Should get Zookeeper node with invalid parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->get(array());
--EXPECTF--
Warning: Zookeeper::get() expects parameter %d to be string, array given in %s on line %d
