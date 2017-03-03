$(function(){
  $("[data-send]").each(function(index){
    var observer = $(this).attr("data-send");
    console.log(observer);
    if(window.dom_observers == null) {
      window.dom_observers = {};
    }

    if(window.dom_observers[observer] == null) {
      window.dom_observers[observer] = Observer();
      window.dom_observers[observer].addListener(function(val){
        $('[data-receive="'+observer+'"]').text(val["value"]);
      });
    }
    window.dom_observers[observer].set($(this).text());
    $(this).click(function(){
      window.dom_observers[observer].set($(this).text());
    })
  });
})
