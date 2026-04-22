<?php
require 'vendor/autoload.php';

use EvMak\Client;
use EvMak\Payment;

$client = new Client("https://vodaapi.evmak.com/evpay-sandbox/collection/", "webhost");

$payment = new Payment($client);

print_r("Library loaded successfully ✅");