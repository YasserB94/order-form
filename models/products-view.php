<?php ?>
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