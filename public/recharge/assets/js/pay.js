$("#nagad-show").hide();
$("#bkash-show").hide();

$(document).ready(function(){
    $("#nagad").click(function(){
        $("#nagad-show").slideToggle();
        $("#bkash-show").slideUp();
      });
})
$(document).ready(function(){
    $("#bkash").click(function(){
        $("#bkash-show").slideToggle();
        $("#nagad-show").slideUp();
      });
})

