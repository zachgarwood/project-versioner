#!/usr/bin/php
<?php

require 'vendor/autoload.php';

use ProjectVersioner\Command;
use Symfony\Component\Console\Application;

$prover = new Application('Prover');
$prover->add(new Command\Version);
$prover->run();
