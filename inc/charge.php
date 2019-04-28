<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'on');
  
  require_once('./stripe-php/init.php');
  require_once('./config/db.php');
  require_once('./lib/pdo_db.php');
  require_once('./models/Customer.php');
  require_once('./models/Subscription.php');

  \Stripe\Stripe::setApiKey('sk_test_zKoQnYj6LySgd8vhFXt967n1');
  
  // Sanitise POST Array
  $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
  
  $first_name = $POST['first_name'];
  $last_name = $POST['last_name'];
  $email = $POST['email'];
  $password = $POST['password'];
  $token = $POST['stripeToken'];
    
  // Create Customer In Stripe
  $customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source"  => $token
  ));
  
  // Charge & Create Subscription
  $subscription = \Stripe\Subscription::create([
    "customer" => $customer->id,
    "items" => [
      [
        "plan" => "plan_ExoQ7iignWpzJe"
      ],
    ]
  ]);
  
  // Customer Data
  $customerData = [
    'id' => $subscription->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'password' => $password
  ];
  
  // Instantiate Customer
  $customer = new Customer();
  
  // Add Customer To DB
  $customer->addCustomer($customerData);
  
  
  // Subscription Data
  $subscriptionData = [
    'id' => $subscription->id,
    'customer_id' => $subscription->customer,
    'status' => $subscription->status
  ];
  
  // Instantiate Customer
  $sub = new Subscription();
  
  // Add Customer To DB
  $sub->addSubscription($subscriptionData);
  
  // Redirect
  header('Location: ../success.php?tid='.$subscription->id);

