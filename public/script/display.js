function ShowItemsList(i){
  var t = Templater("#item-template","#items-container")
  t.clear();
  var items = i["results"];
  for(var key in items) {
    var name = items[key]["name"];
    var price = items[key]["price"];
    var image_id = items[key]["id"] * 102 % 1000;
    var stars = items[key]["grade"]+"0"
    var price_class = "";
    var real_price = "&nbsp;";
    if(items[key]["sale"]) {
      price_class = "price-crossed";
      real_price = "$ "+price;
    }
    t.add({
      name: name,
      base_price: price,
      image_id: image_id,
      stars: stars,
      price_class: price_class,
      real_price: real_price,
    });
  }
}
