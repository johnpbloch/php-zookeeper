--TEST--
Should retrieve error when set invalid data in second parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$client->exists('/test', 1.0);
--EXPECTF--
Warning: Zookeeper::exists() expects parameter %d to be a valid callback, no array or string given in %s on line %d
