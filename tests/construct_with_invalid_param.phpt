--TEST--
Should construct with invalid parameters
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181', 10);
--EXPECTF--
Warning: Zookeeper::__construct() expects parameter %d to be a valid callback, no array or string given in %s on line %d
