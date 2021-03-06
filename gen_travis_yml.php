#!/usr/bin/env php
# autogenerated file; do not edit
sudo: false
language: c

addons:
 apt:
  packages:
   - php5-cli
   - php-pear

env:
 matrix:
<?php

$gen = include "./travis/pecl/gen-matrix.php";
$env = $gen([
	"PHP" => ["5.4", "5.5", "5.6", "master"],
	"enable_debug",
	"enable_maintainer_zts",
	"enable_json" => ["yes"],
]);
foreach ($env as $e) {
	printf("  - %s\n", $e);
}

?>

before_script:
 - make -f travis/pecl/Makefile php
 - make -f travis/pecl/Makefile ext PECL=json_post

script:
 - make -f travis/pecl/Makefile test

