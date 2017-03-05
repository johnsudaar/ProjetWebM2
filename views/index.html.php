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
          <p data-receive="priceMin" data-suffix="$"> 100 $ </p>
          <p class="pull-right" data-receive="priceMax" data-suffix="$"> 10000 $ </p>
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
        <select class="form-control">
          <option>15 per page</option>
          <option>50 per page</option>
          <option>100 per page</option>
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
  </div>
</div>
