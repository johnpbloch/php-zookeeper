<?php
$client = new Zookeeper('localhost:2181');
echo $client->addAuth(array());
