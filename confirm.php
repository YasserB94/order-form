<?php ?>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Please confirm your data:</h4>
  <?php foreach (parseUserInfo() as $userData) : ?>
    <p><?= $userData ?></p>
  <?php endforeach; ?>
  <h4 class="alert-heading">Please confirm your order:</h4>
  <?php foreach (getOrderedProducts() as $product) : ?>
    <p><?= $product['name'] ?></p>
  <?php endforeach; ?>
  <button type="button" class="btn btn-success" name='confirmSuccess'>Yes, Please deliver me my order!</button>
  <button type="button" class="btn btn-danger" name='confirmFailed'>No, I would like to make some changes</button>
</div>