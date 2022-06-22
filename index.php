<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
$products = [
    ['name' => 'Rose All Day Sangria', 'price' => 7],
    ['name' => 'The Splash', 'price' => 5.5],
    ['name' => 'Juice Junkee', 'price' => 4.6],
    ['name' => 'Dirty Talk', 'price' => 5.2],
    ['name' => 'Limoncello Fizz', 'price' => 8.5],
];
$totalValue = 0;
function getProducts()
{
    $products = [
        ['name' => 'Rose All Day Sangria', 'price' => 7],
        ['name' => 'The Splash', 'price' => 5.5],
        ['name' => 'Juice Junkee', 'price' => 4.6],
        ['name' => 'Dirty Talk', 'price' => 5.2],
        ['name' => 'Limoncello Fizz', 'price' => 8.5],
    ];
    return $products;
}
if (isset($_POST['submit'])) {
    handleForm();
}
function handleForm()
{
    require 'head.php';
    $invalidFields = validate($_POST);
    if (empty($invalidFields)) {
        showOrderConfirmation();
        storeUserData();
    } else {
        var_dump($invalidFields);
    }
    $products = getProducts();
    $totalValue = 0;
    require 'form-view.php';
}
function storeUserData()
{
    $fieldsToStore = ["email", "street", "streetnumber", "city", "zipcode"];
    foreach ($_POST as $i => $j) {
        foreach ($fieldsToStore as $x) {
            if ($i === $x) {
                $_SESSION[$x] = $j;
            }
        }
    }
}
function validate()
{
    $invalidFields = [];
    foreach ($_POST as $key => $value) {
        switch ($key) {
            case 'email':
                $mailRegexPattern = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
                if (preg_match($mailRegexPattern, $value) !== 1) {
                    $invalidFields[$key] = $value;
                    break;
                }
                break;
            case 'street':
            case 'city':
                if (!ctype_alpha($value)) {
                    $invalidFields[$key] = $value;
                    break;
                } else {
                    break;
                }
            case 'streetnumber':
            case 'zipcode':
                if (!is_numeric($value)) {
                    $invalidFields[$key] = $value;
                    break;
                } else {
                    break;
                }
            default:
                break;
        }
    }
    return $invalidFields;
}

function showOrderConfirmation()
{

    showConfirmation();
}
function parseUserInfo()
{
    $requiredFields = ["email", "street", "streetnumber", "city", "zipcode"];
    $userData = [];
    foreach ($_POST as $key => $value) {
        foreach ($requiredFields as $field) {
            if ($key === $field) {
                $sanitizedValue = htmlspecialchars($value);
                $userData[$key] = $key . " : " . $sanitizedValue;
            }
        }
    }
    return $userData;
}
function getOrderedProducts()
{
    $products = getProducts();
    $orderedProducts = [];
    if (isset($_POST['products'])) {
        foreach ($_POST['products'] as $i => $productIndex) {
            array_push($orderedProducts, $products[$i]);
        }
    }
    return $orderedProducts;
}
function showConfirmation()
{
    require 'confirm.php';
}
if (!isset($_POST['submit'])) {
    require 'head.php';
    require 'form-view.php';
}
