$(function() {
  window.cart = Observer();
  window.cart.set([]);
  window.cart.addListener(function(values, index) {
    showCartList(values["value"]);
  });

  registerDomObserver("cart-meta");
  window.dom_observers["cart-meta"].set(0, "price");
  window.dom_observers["cart-meta"].set(0, "count");
  window.dom_observers["cart-meta"].set("", "items");

  window.dom_observers["cart-meta"].addListener(function(values, index) {
    if(index == "items") {
      $("#cart-global-input").val(values[index]);
    }
  });

})

function refreshCartItemListeners() {
  $(".add-to-cart").click(function() {
    var item = findById($(this).attr("data-item-id"), window.items);
    var cart = window.cart.get();
    cart[cart.length] = item;
    var total_price = 0;
    var items = "";
    for(var i = 0; i < cart.length; i++) {
      var price = cart[i]["price"] * 1;
      if(cart[i]["sale"]) {
        price = price * (100 - cart[i]["sale"]) / 100;
      }
      total_price = total_price + price;
      items += cart[i]["id"]+","
    }
    window.cart.set(cart);
    window.cart.set(items, "items");
    window.dom_observers["cart-meta"].set(cart.length, "count");
    window.dom_observers["cart-meta"].set(total_price, "price");
    window.dom_observers["cart-meta"].set(items, "items");
  });
}

function findById(id, items) {
  var item = null;
  for(var i = 0; i < items.length; i++) {
    if(items[i]["id"] == id) {
      return items[i];
    }
  }

  return null;
}
