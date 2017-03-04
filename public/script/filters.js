window.filters = Observer();
window._filter = Observer();

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
    filter[filter.length] = "pric_maxe="+value["categorie"];
  }
  if(value["price_min"] != null) {
    filter[filter.length] = "price_min="+value["categorie"];
  }
  if(value["page"] != null) {
    filter[filter.length] = "page="+value["page"];
  }

  window._filter.set(filter);
});

window._filter.addListener(function(f){
});
