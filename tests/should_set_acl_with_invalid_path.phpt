--TEST--
Test should set acl with invalid path
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
?>
--FILE--
<?php
$client = new Zookeeper('127.0.0.1:2181');
try {
    $client->setAcl('/tesa', -1, array(
        array(
            'perms'  => Zookeeper::PERM_ALL,
            'scheme' => 'world',
            'id'     => 'anyone'
        )
    ));
} catch (ZookeeperNoNodeException $znne) {
    printf("%s\n%d", $znne->getMessage(), $znne->getCode());
}
--EXPECTF--
no node
-101