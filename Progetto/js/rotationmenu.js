
function menulato(){

  $(".menulato").click(function(){
    
    $(".navhidden").animate({width: 'toggle'}, "slow");
    //inserisco una nuova classe 
    $(".menulato").toggleClass("menuhamburger");
    
    if($(".menulato").hasClass("menuhamburger")){
      $(".fas").css({
        "transform": " rotate(180deg)"
      })
    }else{
      $(".fas").css({
        "transform": " rotate(0deg)"
      })
      
    }
  });

}