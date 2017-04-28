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

    showPagination(i["page"], i["total_page"]);
    refreshDomObservers();
  }
}

function generatePaginationData(page, cur_page){
  if(page == cur_page){
    return {
      page: page,
      state: "enabled"
    }
  } else {
    return {
      page: page,
      state: "",
    }
  }
}

function showPagination(cur_page, total_page) {
  var max_page = 5;
  var t = Templater("#page-template", "#paginator-container");
  t.clear();
  if(cur_page > max_page) {
    t.add(generatePaginationData(1, cur_page));
  }

  var start_page = cur_page - Math.floor(max_page/2);
  if(start_page < 1) {
    start_page  = 1;
  }

  for(var i = start_page; i < start_page + max_page; i++) {
    if(i <= total_page) {
      t.add(generatePaginationData(i, cur_page));
    }
  }

  if(cur_page < total_page - max_page) {
    t.add(generatePaginationData(total_page, cur_page));
  }
}

function showCartList(items) {
  console.log(items);
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
