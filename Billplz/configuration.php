<?php
/**
 * Instruction:
 *
 * 1. Replace the APIKEY with your API Key.
 * 2. OPTIONAL: Replace the COLLECTION with your Collection ID.
 * 3. Replace the X_SIGNATURE with your X Signature Key
 * 4. Replace the http://www.google.com/ with your FULL PATH TO YOUR WEBSITE. It must be end with trailing slash "/".
 * 5. Replace the http://www.google.com/success.html with your FULL PATH TO YOUR SUCCESS PAGE. *The URL can be overridden later
 * 6. OPTIONAL: Set $amount value.
 * 7. OPTIONAL: Set $fallbackurl if the user are failed to be redirected to the Billplz Payment Page.
 *
 */
 $api_key = '14531bf8-7a51-4c5d-9037-d9a34d06cf08';
 $collection_id = '6mpn3wao';
 $x_signature = 'S-1Jk5jo68zahFmjaVPy1c8Q';

$websiteurl = 'https://coffee-fastlane.com/shop';
$successpath = '';
$amount = ''; //Example (RM13.50): $amount = '1350';
$fallbackurl = base_url('orders/checkout'); //Example: $fallbackurl = 'http://www.google.com/pay.php';
$description = 'PAYMENT DESCRIPTION';
$reference_1_label = 'Order No.';
// $reference_2_label = 'Name';
