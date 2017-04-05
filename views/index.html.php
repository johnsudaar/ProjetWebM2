<h2 data-receive="shopClass" class="shop-class"> </h2>
<div class="row">
  <div class="col-sm-3">
    <div class="panel panel-default filters">
      <div class="panel-heading">
        <p class="panel-title small">Shop by</p>
      </div>
      <div class="panel-body">
        <p class="filter-title"> Categories </p>
        <div class="line"></div>
        <?= generate_menu($categories, true); ?>
        <p class="filter-title"> Price </p>
        <div class="line"></div>
        <div>
          <input type="range" multiple value="100,10000" min="100" max="10000" step="50" />
        </div>
        <div class="row row-reset">
          <p data-receive="filters" data-categorie="price_min" data-suffix="$"> 100 $ </p>
          <p class="pull-right" data-receive="filters" data-categorie="price_max" data-suffix="$"> 10000 $ </p>
        </div>

        <p class="filter-title"> Color </p>
        <div class="line"></div>
        <div class="colors">
          <div class="red"></div>
          <div class="orange"></div>
          <div class="yellow"></div>
          <div class="green"></div>
          <div class="aqua"></div>
          <div class="cyan"></div>
          <div class="light-blue"></div>
          <div class="blue"></div>
          <div class="dark-purple"></div>
          <div class="purple"></div>
          <div class="black"></div>
          <div class="white"></div>
          <div class="black-white"></div>
          <div class="pink"></div>
          <div class="dark-pink"></div>
        </div>

        <p class="filter-title"> Brand </p>
        <div class="line"></div>

        <ul>
          <?php foreach ($brands as $brand): ?>
            <li> <?= $brand->getName() ?>
          <?php endforeach; ?>
        </ui>
      </div>
    </div>
  </div>

  <div class="col-sm-9 main-shop">
    <img class="full-width" src="/public/images/placeholder1.png" />
    <div class="items-header">
      <p class="items">
        150 items
      </p>
      <div class="form-inline display-selectors">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-default active glyphicon glyphicon-th-large">
            <input type="radio" name="options" id="grid" autocomplete="off" checked>
          </label>
          <label class="btn btn-default glyphicon glyphicon-th-list">
            <input type="radio" name="options" id="list" autocomplete="off">
          </label>
      </div>
        <select class="form-control" data-send="filters" data-suffix="per_page">
          <option value="15">15 per page</option>
          <option value="50">50 per page</option>
          <option value="100">100 per page</option>
        </select>
        <select class="form-control">
          <option>Position</option>
          <option>Position</option>
          <option>Position</option>
        </select>
        <button class="btn btn-default glyphicon glyphicon-arrow-up"></button>
      </div>
    </div>
    <div class="margin-small separator"></div>
    <div class="row item-list" id="items-container">
    </div>
    <div class="template-hidden" id="item-template">
      <div class="col-md-4 item">
        <div class="align-center">
          <img src="https://unsplash.it/160/206/?image={image_id}" class="item-image" alt="{name}"/>
        </div>
        <a href="#"> {name} </a> <br/>
        <p class="{price_class}"> $ {base_price}
          <p class="sale-price">
            {real_price}
          </p>
        </p>
        <div class="grade">
          <div class="outline-star">
            <div class="glyphicon glyphicon-star-empty"></div>
            <div class="glyphicon glyphicon-star-empty"></div>
            <div class="glyphicon glyphicon-star-empty"></div>
            <div class="glyphicon glyphicon-star-empty"></div>
            <div class="glyphicon glyphicon-star-empty"></div>
          </div>
          <div class="full-star" style="width:{stars}%;">
            <div class="glyphicon glyphicon-star"></div>
            <div class="glyphicon glyphicon-star"></div>
            <div class="glyphicon glyphicon-star"></div>
            <div class="glyphicon glyphicon-star"></div>
            <div class="glyphicon glyphicon-star"></div>
          </div>
        </div>
        <div class="item-actions">
          <img src="/public/images/add_to_cart.png" alt="Add to cart"/>
          <div class="flex-separator"></div>
          <img src="/public/images/swap.png"/>
          <img src="/public/images/add.png"/>
        </div>
      </div>
    </div>
  </div>
</div>
