function registerDomObserver(observer){
  if(window.dom_observers == null) {
    window.dom_observers = {};
  }

  if(window.dom_observers[observer] == null) {
    window.dom_observers[observer] = Observer();
    window.dom_observers[observer].addListener(function(val){
      $('[data-receive="'+observer+'"]').each(function(index){
        if($(this).attr("data-categorie") != null) {
          str = val[$(this).attr("data-categorie")];
        } else {
          str = val["value"];
        }
        str = val["value"];
        if($(this).attr("data-suffix") != null) {
          str += " "+$(this).attr("data-suffix");
        }
        $(this).text(str);
      })
    });
  }
}

$(function(){
  $("[data-send]").each(function(index){
    var observer = $(this).attr("data-send");
    registerDomObserver(observer);
    window.dom_observers[observer].set($(this).val());
    $(this).click(function(){
    });
  });
})
