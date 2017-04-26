function showItemsList(i){
  var t = Templater("#item-template","#items-container")
  t.clear();
  var items = i["results"];
  for(var key in items) {
    var id = items[key]["id"];
    var name = items[key]["name"];
    var price = items[key]["price"];
    var image_id = items[key]["id"] * 102 % 1000;
    var stars = items[key]["grade"]+"0"
    var price_class = "";
    var real_price = "&nbsp;";
    var flash_class = "hidden";
    var flash_text = "";
    var sale = 0;
    if(items[key]["sale"]) {
      flash_class = "sale";
      sale=items[key]["sale"];
      price_class = "price-crossed";
      real_price = "$ "+(price * (100 - sale) / 100);
      flash_text = "-"+sale+"%";
    }

    if(items[key]["new"]) {
      flash_class = "new";
      flash_text = "New!";
    }

    t.add({
      id: id,
      name: name,
      base_price: price,
      image_id: image_id,
      stars: stars,
      price_class: price_class,
      real_price: real_price,
      flash_class: flash_class,
      flash_text: flash_text,
    });
  }
}

function showCartList(items) {
  var t = Templater("#cart-item-template", "#cart-items-container");
  t.clear();

  for(var key in items) {
    var price = items[key]["price"];
    if(items[key]["sale"]) {
      price = price * (100 - items[key]["sale"]) / 100;
    }
    t.add({
      id: items[key]["id"],
      name: items[key]["name"],
      price: price,
    })
  }
}
