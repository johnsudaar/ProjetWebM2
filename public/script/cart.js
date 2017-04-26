$(function() {
  window.cart = Observer();
  window.cart.set([]);
  window.cart.addListener(function(values, index) {
    showCartList(values[index]);
  });

  registerDomObserver("cart-meta");
  window.dom_observers["cart-meta"].set(0, "price");
  window.dom_observers["cart-meta"].set(0, "count");

})

function refreshCartItemListeners() {
  $(".add-to-cart").click(function() {
    console.log("Salut");
    var item = findById($(this).attr("data-item-id"), window.items);
    var cart = window.cart.get();
    cart[cart.length] = item;
    var total_price = 0;
    for(var i = 0; i < cart.length; i++) {
      var price = cart[i]["price"] * 1;
      if(cart[i]["sale"]) {
        price = price * (100 - cart[i]["sale"]) / 100;
      }
      total_price = total_price + price;
    }
    window.cart.set(cart);
    window.dom_observers["cart-meta"].set(cart.length, "count");
    window.dom_observers["cart-meta"].set(total_price, "price");
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
