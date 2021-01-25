
window.onload = start;

var allmenuu = {
  "C": {
    "ingredients": "meat, salad, tomato, onion, pickle",
    "price":5,
    "quantity":0,
  },
  "C++":{
    "ingredients": "meat, salad, tomato, onion, pickle, cheese",
    "price":5.50,
    "quantity":0,
  },
  "JAVA": {
    "ingredients": "meat, salad, tomato, onion, pickle, bacon",
    "price":6,
    "quantity":0,
  },
  "JAVASCRIPT": {
    "ingredients": "meat, tomato, onion, pickle, cheese, bacon",
    "price":6.50,
    "quantity":0,
  },
  "PHP": {
    "ingredients": "chicken, salad, cheese, tzatziki",
    "price":5.50,
    "quantity":0,
  },
  "HTML": {
    "ingredients": "vegetables, garlic sauce, salad",
    "price":4.50,
    "quantity":0,
  },
}

if(localStorage.getItem("allmenu") != null){
  //esiste
}else{
  localStorage.setItem("allmenu", JSON.stringify(allmenuu));

}


function start(){
  
  signin();
  menulato();
  makeburger();
  about();
  
  modify();
  cart();
  
  
  
  


  
  

  var allmenu = JSON.parse(localStorage.getItem("allmenu"));
  $(".card-back").click(function(){
    

    let namehamburger = $(this).find("h2").text().trim();

 
    $("#cart").fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
 
    $(".popup").fadeIn(1000).delay(1000).fadeOut(1000);
    allmenu[namehamburger]["quantity"] += 1;
    localStorage.setItem("allmenu", JSON.stringify(allmenu));
    

  })
  
  //on clik appear modal box w/ info are you suce disconnect
  $("#logout").click(function(){
    var modal = $("#hid");
  

    modal.css("display","block");

    $("#cancbtn").click(function(){
      modal.css("display","none");
    })
    
  })
  
  $("#btnok").click(function(){
    localStorage.clear();
  });



  game();

}










