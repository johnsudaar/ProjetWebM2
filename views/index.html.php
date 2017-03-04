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
</div>
