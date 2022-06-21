<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);
// We are going to use session variables so we need to enable sessions
session_start();
setlocale(LC_ALL, 'nl_NL');
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
function getPostData()
{
    $Data = [];
    foreach ($_POST as $key => $value) {
        $Data[$key] = $value;
    }
    return $Data;
}
function filterOrderFormData(array $arrayToFilter)
{
    $requiredFields = ["email", "street", "streetnumber", "city", "zipcode"];
    $formData = [];
    foreach ($arrayToFilter as $key => $value) {
        foreach ($requiredFields as $requiredField) {
            if ($key === $requiredField) {
                $formData[$key] = $value;
            }
        }
    };
    return $formData;
}


// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Rose All Day Sangria', 'price' => 7],
    ['name' => 'The Splash', 'price' => 5.5],
    ['name' => 'Juice Junkee', 'price' => 4.6],
    ['name' => 'Dirty Talk', 'price' => 5.2],
    ['name' => 'Limoncello Fizz', 'price' => 8.5],
];

$totalValue = 0;
//All required fields

function validate(array $data)
{
    $invalidFields = [];
    //Check For empty fields;
    foreach ($data as $key => $value) {
        if ($value === "") {
            $invalidFields[$key] = $value;
        };
        //RETURN EARLY IF EMPTY FIELDS WERE FOUND
        if (!empty($invalidFields)) {
            return $invalidFields;
        }
    }
    //Check if street/city = only letters [A-Z,a-z]
    if (!ctype_alpha($data["street"])) {
        $invalidFields["street"] = $data["street"];
    }
    if (!ctype_alpha($data["city"])) {
        $invalidFields["city"] = $data["city"];
    }
    //Check if Str number/zipcode = only numbers [0-9]
    if (!is_numeric($data["streetnumber"])) {
        $invalidFields["streetnumber"] = $data["streetnumber"];
    }
    if (!is_numeric($data["zipcode"])) {
        $invalidFields["zipcode"] = $data["zipcode"];
    }
    //Check for valid email adress
    return $invalidFields;
}
function handleForm($orderFormData)
{
    if (!empty(validate($orderFormData))) {
        //ONE OF THE FIELDS IS EMPTY
        echo "INVALID FIELD FOUND";
        var_dump(validate($orderFormData));
    } else {
        //Fields were validated
    }
}
//----MAIN----
if (isset($_POST['submit'])) {
    $orderFormData = filterOrderFormData(getPostData());
    handleForm($orderFormData);
}
require 'form-view.php';








//--------OBSOLETE-----CLEAN ON PRODUCTION----
// $products = [
//     ['name' => 'Manchego', 'price' => 6],
//     ['name' => 'Spagethi', 'price' => 10.5],
//     ['name' => 'Olive Dip', 'price' => 5.5],
//     ['name' => 'Mixed Nuts', 'price' => 1],
//     ['name' => 'Cheesy Nachos', 'price' => 5],
// ];


// if (!(ctype_alpha($data["street"]) || ctype_alpha($data["city"]))) {
//     echo "Invalid Street/city";
// }