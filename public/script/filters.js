window.filters = Observer();
window._filter = Observer();

window.filter_timeout = 0;

window.getDomObserver("filters").addListener(function(value, index) {
  console.log("set");
  window.filters.set(value[index], index);
})

window.filters.addListener(function(value){
  console.log("receive")
  filter = [];
  if(value["categorie"] != null) {
    filter[filter.length] = "categorie_id="+value["categorie"];
  }
  if(value["color"] != null) {
    filter[filter.length] = "color="+value["color"];
  }
  if(value["brand"] != null) {
    filter[filter.length] = "brand_id="+value["brand"];
  }
  if(value["price_max"] != null) {
    filter[filter.length] = "price_max="+value["price_max"];
  }
  if(value["price_min"] != null) {
    filter[filter.length] = "price_min="+value["price_min"];
  }
  if(value["page"] != null) {
    filter[filter.length] = "page="+value["page"];
  }

  if(value["per_page"] != null) {
    filter[filter.length] = "per_page="+value["per_page"];
  }

  // Prevent useless refresh
  clearTimeout(window.filter_timeout);
  window.filter_timeout = setTimeout(function(){
    console.log(filter)
    window._filter.set(filter);
  }, 500);

});

window._filter.addListener(function(f){
  Promise().then(constructFilter).then(getProducts).then(showItemsList).error(showError).call(null);
});

function constructFilter(d, resolve, reject) {
  filter = window._filter.get();
  resolve(filter.join("&"))
}

function getProducts(data, resolve, reject) {
  $.getJSON("/index.php/product/search?"+data, function(data){
    resolve(data);
  }).fail(function(jqxhr, textStatus, error){
    var err = textStatus + ", " + error;
    reject(err)
  })
}

function showError(error) {
  console.log(error);
}
