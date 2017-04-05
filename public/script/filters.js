window.filters = Observer();
window._filter = Observer();

window.filter_timeout = 0;

window.filters.addListener(function(value){
  filter = [];
  if(value["categorie"] != null) {
    filter[filter.length] = "categorie="+value["categorie"];
  }
  if(value["color"] != null) {
    filter[filter.length] = "color="+value["color"];
  }
  if(value["brand"] != null) {
    filter[filter.length] = "brand="+value["brand"];
  }
  if(value["price_max"] != null) {
    filter[filter.length] = "pric_max="+value["categorie"];
  }
  if(value["price_min"] != null) {
    filter[filter.length] = "price_min="+value["categorie"];
  }
  if(value["page"] != null) {
    filter[filter.length] = "page="+value["page"];
  }

  if(value["per_page"] != null) {
    filter[filter.length] = "per_page="+value["page"];
  }

  // Prevent useless refresh
  clearTimeout(window.filter_timeout);
  window.filter_timeout = setTimeout(function(){
    window._filter.set(filter);
  }, 500);

});

window._filter.addListener(function(f){
  Promise().then(function(d, resolve, reject){
    $.getJSON("/index.php/product/search", function(data){
      resolve(data);
    }).fail(function(jqxhr, textStatus, error){
      var err = textStatus + ", " + error;
      reject(err)
    })
  }).then(function(data, resolve, reject){
    console.log(data);
    ShowItemsList(data);
  }).error(function(e){
    console.log("Error: "+e)
  }).call(null);
});
