<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_4FVIic9QMnsKUSJK6V5KOU1l",
  "publishable_key" => "pk_test_PClPmBF9bl8qmF4ODNl6Hecp"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>