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

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Rose All Day Sangria', 'price' => 7],
    ['name' => 'The Splash', 'price' => 5.5],
    ['name' => 'Juice Junkee', 'price' => 4.6],
    ['name' => 'Dirty Talk', 'price' => 5.2],
    ['name' => 'Limoncello Fizz', 'price' => 8.5],
];
// $products = [
//     ['name' => 'Manchego', 'price' => 6],
//     ['name' => 'Spagethi', 'price' => 10.5],
//     ['name' => 'Olive Dip', 'price' => 5.5],
//     ['name' => 'Mixed Nuts', 'price' => 1],
//     ['name' => 'Cheesy Nachos', 'price' => 5],
// ];

$totalValue = 0;

function validate()
{
    //All required fields
    $requiredFields = ["email", "street", "streetnumber", "city", "zipcode"];
    //Array to hold invalid fields
    $invalidFields = [];
    //Check $_POST array, if a field is empty put it in invalidFields Array
    foreach ($requiredFields as $field) {
        if ($_POST[$field] === "") {
            array_push($invalidFields, $field);
        };
    }
    //Return array with invalid fields
    return $invalidFields;
}
function handleForm()
{
    $invalidFields = validate();
    if (!empty($invalidFields)) {
        //ONE OF THE FIELDS IS EMPTY
    } else {
        //ALL FIELDS WERE FILLED IN
    }
}
//Check if form was submitted
if (isset($_POST['submit'])) {
    handleForm();
}

require 'form-view.php';
