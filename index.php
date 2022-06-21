<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);
// We are going to use session variables so we need to enable sessions
session_start();
//GLOBALS
$products = [
    ['name' => 'Rose All Day Sangria', 'price' => 7],
    ['name' => 'The Splash', 'price' => 5.5],
    ['name' => 'Juice Junkee', 'price' => 4.6],
    ['name' => 'Dirty Talk', 'price' => 5.2],
    ['name' => 'Limoncello Fizz', 'price' => 8.5],
];
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
$totalValue = 0;
//FUNCTIONS
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
function ReplaceInfoWithErrorMessage(array $invalidFields)
{
    $errormessage = "";
    foreach ($invalidFields as $key => $value) {
        if (substr($value, 0, 3) === "!!!") {
            return;
        }
        switch ($key) {
            case "email":
                $errormessage = "!!!ERROR!: " . htmlspecialchars($value) . " is not a valid email adress.";
                break;
            case "street":
                $errormessage = "!!!ERROR: " . htmlspecialchars($value) . " is not a valid street name";
                break;
            case "city":
                $errormessage = "!!!ERROR: " . htmlspecialchars($value) . " is not a valid city";
                break;
            case "streetnumber":
                $errormessage = "!!!ERROR: " . htmlspecialchars($value) . " is not a number";
                break;
            case "zipcode":
                $errormessage = "!!!ERROR: " . htmlspecialchars($value) . " is not a valid zipcode";
                break;
        }
        if ($errormessage != "") {
            $_SESSION[$key] = $errormessage;
        }
    }
}
function getOrderedProducts()
{
    $POST_PRODUCTS = getPostData()["products"];
    $orderedProducts = [];
    foreach ($POST_PRODUCTS as $key => $chosen) {
        if ($chosen) {
            array_push($orderedProducts, getProducts()[$key]);
        }
    }
    return $orderedProducts;
}
function getOrderedProductsNames()
{
    $products = getOrderedProducts();
    $productNames = [];
    foreach ($products as $product) {
        array_push($productNames, $product["name"]);
    }
    return $productNames;
}
function storeInfoToSession($postData)
{
    foreach ($postData as $key => $value) {
        $_SESSION[$key] = $value;
    }
}
function calculateTotalOrderPrice()
{
    $orderedProducts = getOrderedProducts();
    $total = 0;
    foreach ($orderedProducts as $product) {
        $total += $product["price"];
    }
    return $total;
}
function askForUserConfirmation(array $userData, array $selectedProducts)
{
}
//----MAIN----
if (isset($_POST['submit'])) {
    require 'form-view.php';
    $orderFormData = filterOrderFormData(getPostData());
    handleForm($orderFormData);
} else {
    require 'form-view.php';
}
function handleForm($orderFormData)
{
    storeInfoToSession(getPostData());
    $products = getProducts();
    if (!empty(validate($orderFormData))) {
        ReplaceInfoWithErrorMessage(validate($orderFormData));
        return false;
    } else {
        echo 'Handling';
        handleConfirmation();
    }
}
function handleConfirmation()
{
    require 'confirm.php';
}

require 'footer.php';
//HELPERS
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
