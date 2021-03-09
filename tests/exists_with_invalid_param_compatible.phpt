--TEST--
Should retrieve error when set invalid data in second parameter
--SKIPIF--
<?php
if (!extension_loaded('zookeeper'))
    echo 'skip ZooKeeper extension is not loaded';
if (version_compare(PHP_VERSION, "8.0.0") >= 0) {
    echo "skip PHP version should not greater than 8.0.0";
}
?>
--FILE_EXTERNAL--
files/exists_with_invalid_param.inc
--EXPECTF--
Warning: Zookeeper::exists() expects parameter %d to be a valid callback, no array or string given in %s on line %d
