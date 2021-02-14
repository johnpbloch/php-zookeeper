--TEST--
Test should set deterministic conn order with invalid parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->setDeterministicConnOrder(array());
--EXPECTF--
Warning: Zookeeper::setDeterministicConnOrder() expects parameter %d to be boo%s, array given in %s on line %d
