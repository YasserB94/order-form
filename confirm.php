<?php ?>
<form method='post' action="confirmController.php">
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Please confirm your data:</h4>
    <?php foreach (parseUserInfo() as $userData) : ?>
      <p><?= $userData ?></p>
    <?php endforeach; ?>
    <h4 class="alert-heading">Please confirm your order:</h4>
    <?php foreach (getOrderedProducts() as $product) : ?>
      <p><?= $product['name'] ?></p>
    <?php endforeach; ?>
    <input type="submit" class="btn btn-success" name='confirmSuccess' value="Yes, Please deliver me my order!"></input>
    <input type="submit" class="btn btn-danger" name='confirmFailed' value="No, I would like to make some changes"></input>
  </div>
</form>