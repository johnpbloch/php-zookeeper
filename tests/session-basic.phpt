--TEST--
Basic session should work
--INI--
session.save_handler=zookeeper
session.save_path=127.0.0.1:2181
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
session_start();
$session_id = session_id();
$_SESSION['foo'] = 123;
session_commit();

session_id($session_id);
session_start();
var_dump($_SESSION['foo']);
--EXPECT--
int(123)
