<h1> Shopping cart </h1>

<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <th class="col-md-5">Item name</th>
      <th class="col-md-2">Price</th>
      <th class="col-md-2">Quantity</th>
      <th class="col-md-2">SubTotal</th>
      <th class="col-md-1 hide-text">NA</th>
    </tr>

    <?php foreach($items as $item) { ?>
    <tr class="checkout-line">
      <td class="col-md-5">
        <img src="https://unsplash.it/70/90/?image=<?=$item["product"]->getId()* 102 % 1000?>" class="item-image-checkout" alt=""/>
        <a href="#"><?= $item["product"]->getName() ?> </a>
      </td>
      <td class="col-md-2"><?= $item["product"]->getRealPrice() ?> € </td>
      <td class="col-md-2"><div class="checkout-count"><?= $item["count"] ?></div></td>
      <td class="col-md-2">$ <?= $item["count"] * $item["product"]->getRealPrice() ?></td>
      <td class="col-md-1 hide-text"></td>
    </tr>
    <?php } ?>
  </table>
</div>

<div class="row cart-form">
  <div class="col-md-4 col-sm-12">
    <h4> Estimate and Shipping taxes </h4>

    Enter your destination to get a shipping estimate.

    <div class="form-group">
      <label for="country">Contry</label>
      <input type="text" class="form-control" id="country" placeholder="Country">
    </div>

    <div class="form-group">
      <label for="state">State / Province</label>
      <input type="text" class="form-control" id="state" placeholder="State / Province">
    </div>

    <div class="form-group">
      <label for="zip">ZIP / Postal Code</label>
      <input type="text" class="form-control" id="zip" placeholder="ZIP / Postal Code">
    </div>
    <input type="submit" value="GET A QUOTE" class="btn btn-bordered"/>
  </div>

  <div class="col-md-4 col-sm-12">
    <h4> Discount Coupon </h4>

    Enter coupon code below if you have one.

    <div class="form-group">
      <label for="country"> Get a coupon discount here</label>
      <input type="text" class="form-control" id="country" placeholder="Country">
    </div>
    <input type="submit" value="APPLY COUPON" class="btn btn-bordered"/>
  </div>

  <div class="col-md-4 col-md-12">
    <h4> Order Total </h4>
    <div class="row">
      <div class="col-md-6"> SubTotal </div>
      <div class="col-md-6 align-right"> $ <?= $total ?> </div>
    </div>
    <div class="row">
      <div class="col-md-6"> Grand total </div>
      <div class="col-md-6 align-right grand-total"> $&nbsp;<?= $total ?> </div>
    </div>
    <div class="row btn-checkout-container">
      <a href="#" class="btn btn-primary btn-checkout"> Proceed to checkout </a>
    </div>
  </div>
</div>
