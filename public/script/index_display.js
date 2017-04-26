$(function() {
  $(".brands li").click(function() {
    $(".brands li").removeClass("selected");
    $(this).addClass("selected");
  })

  $(".categories .pointer").click(function() {
    $(".categories .pointer").removeClass("selected");
    $(this).addClass("selected");
  })
})
