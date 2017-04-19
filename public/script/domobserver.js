function registerDomObserver(observer){
  if(window.dom_observers == null) {
    window.dom_observers = {};
  }

  if(window.dom_observers[observer] == null) {
    window.dom_observers[observer] = Observer();
  }
  window.dom_observers[observer].addListener(function(val){
    $('[data-receive="'+observer+'"]').each(function(index){
      if($(this).attr("data-categorie") != null) {
        str = val[$(this).attr("data-categorie")];
      } else {
        str = val["value"];
      }
      if($(this).attr("data-suffix") != null) {
        str += " "+$(this).attr("data-suffix");
      }
      $(this).text(str);
    })
  });
}

$(function(){
  $("[data-send]").each(function(index){
    var observer = $(this).attr("data-send");
    registerDomObserver(observer);
    var cat = "value";
    if($(this).attr("data-categorie") != null) {
      cat = $(this).attr("data-categorie");
    }

    if($(this).attr("data-value") != null) {
      $(this).click(function() {
        window.dom_observers[observer].set($(this).attr("data-value"), cat);
      });
    } else {
      $(this).change(function() {
        window.dom_observers[observer].set($(this).val(), cat);
      });
      window.dom_observers[observer].set($(this).val(), cat);
    }
  });
})

function getDomObserver(observer) {
  if(window.dom_observers == null) {
    window.dom_observers = {};
  }

 if(window.dom_observers[observer] == null) {
    window.dom_observers[observer] = Observer();
  }

  return window.dom_observers[observer];
}
