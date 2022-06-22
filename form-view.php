<?php // This file is mostly containing things for your view / html 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <title>Your fancy store</title>
</head>

<body>
    <div class="container">
        <h1>Place your order</h1>
        <?php // Navigation for when you need it 
        ?>
        <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <?php
                    if (isset($invalidFields['email'])) {
                        echo '<p>Please enter a valid email adress!</p>';
                    }
                    ?>
                    <input type="email" id="email" name="email" class="form-control" value="<?php if (isset($invalidFields['email'])) {
                                                                                                echo htmlspecialchars($invalidFields['email']);
                                                                                            } else if (isset($_SESSION['email'])) {
                                                                                                echo htmlspecialchars($_SESSION['email']);
                                                                                            } ?>" />
                </div>
                <div></div>
            </div>

            <fieldset>
                <legend>Address</legend>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <?php
                        if (isset($invalidFields['street'])) {
                            echo '<p>Your street name can only contain letters!</p>';
                        }
                        ?>
                        <input type="text" name="street" id="street" class="form-control" value="<?php if (isset($invalidFields['street'])) {
                                                                                                        echo htmlspecialchars($invalidFields['street']);
                                                                                                    } else if (isset($_SESSION['street'])) {
                                                                                                        echo htmlspecialchars($_SESSION['street']);
                                                                                                    } ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="streetnumber">Street number:</label>
                        <?php
                        if (isset($invalidFields['street'])) {
                            echo '<p>Please only enter numbers here</p>';
                        }
                        ?>
                        <input type="text" id="streetnumber" name="streetnumber" class="form-control" value="<?php if (isset($invalidFields['streetnumber'])) {
                                                                                                                    echo htmlspecialchars($invalidFields['streetnumber']);
                                                                                                                } else if (isset($_SESSION['streetnumber'])) {
                                                                                                                    echo $_SESSION['streetnumber'];
                                                                                                                } ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <?php
                        if (isset($invalidFields['city'])) {
                            echo '<p>We do not judge you for living on the parking but enter a valid city please</p>';
                        }
                        ?>
                        <input type="text" id="city" name="city" class="form-control" value="<?php if (isset($invalidFields['city'])) {
                                                                                                    echo htmlspecialchars($invalidFields['city']);
                                                                                                } else if (isset($_SESSION['city'])) {
                                                                                                    echo htmlspecialchars($_SESSION['city']);
                                                                                                } ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipcode">Zipcode</label>
                        <?php
                        if (isset($invalidFields['zipcode'])) {
                            echo '<p>If your zipcode has letters we can not reach you, sorry!</p>';
                        }
                        ?>
                        <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php if (isset($invalidFields['zipcode'])) {
                                                                                                        echo htmlspecialchars($invalidFields['zipcode']);
                                                                                                    } else if (isset($_SESSION['zipcode'])) {
                                                                                                        echo htmlspecialchars($_SESSION['zipcode']);
                                                                                                    } ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Products</legend>
                <?php foreach ($products as $i => $product) : ?>
                    <label>
                        <?php // <?= is equal to <?php echo 
                        ?>
                        <input type="checkbox" value="1" name="products[<?php echo $i ?>]" /> <?php echo $product['name'] ?> -
                        &euro; <?= number_format($product['price'], 2) ?></label><br />
                <?php endforeach; ?>
            </fieldset>

            <button type="submit" class="btn btn-primary" name="submit">Order!</button>
        </form>

        <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
    </div>

    <style>
        footer {
            text-align: center;
        }
    </style>
</body>

</html>