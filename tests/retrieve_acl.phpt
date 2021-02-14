--TEST--
Should retrieve acl
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
$acl = $client->getAcl('/zookeeper');
echo $acl[1][0]['perms'] === Zookeeper::PERM_ALL;
echo $acl[1][0]['scheme'];
echo $acl[1][0]['id'];
--EXPECTF--
1worldanyone
