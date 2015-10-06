#!/usr/bin/env php
<?php

require __DIR__.'/../vendor/autoload.php';

use Invoicer\GenerateInvoiceCommand;
use Invoicer\ShowSampleCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GenerateInvoiceCommand());
$application->add(new ShowSampleCommand());
$application->run();
