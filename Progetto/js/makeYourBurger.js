var limit = 0;

var ing = [];


function makeburger(){
    //click lato sinistro
    var a = $("#ing").children();
    
    a.each(function(){
      $(this).click(function(){
        if(limit<7){
          
          showOnHamburger(this);
          ing.push(this.id);
          $(this).hide();
  
        }else{
          //limit
        }
      });
    })
  
  
  
    //click per rimuovere dal panino e farlo comparire a lato
    var b = $(".nelpanino").children();
    b.each(function(){
      $(this).click(function(){
        hideOnHamburger(this);
        var textingredient = this.id;
        var index = ing.indexOf(textingredient);//return index of ingredient to remove
        ing.splice(index, 1);//remove ing from array
        
        
        var i = $("#ing > #"+textingredient);
        i.show();
      })
    })

    //add name hamburger
    $(".namehamburger").on("submit", function(event){
      event.preventDefault();

      
      let nome = $("input[name='namehmbg']").val();
      var json = JSON.stringify(ing);
      $.ajax({
        type: "POST",
        data: {
                name: nome,
                result:json,

              },
        url: "user/check_burger.php",
        success:  function(data){
                    var arr = JSON.parse(data);

                    if(arr["add"] == "true"){
                      msg("hiddenmsg");
                    }else if(arr["add"] == "false"){
                      msg("hiddenmsgNoAdd");
                    }else if(arr["add"] == "ing"){
                      msgNoReload("msging");
                    }
                  },
      })
    })

    //delete hamburger
    $(".delete").on("click", function(){
      
      var nameHamburger = this.id;

      $.ajax({
        data: {remove: nameHamburger},
        url: "user/check_burger.php",
        success: msg("hiddenmsgrem"),
      })
    })


    $(".mylist").on("click", function(){
      $(".list").toggle();

    })
    
    $(".list").find("h3").each(function(){
      $(this).click(function(){
        var allmenu = JSON.parse(localStorage.getItem("allmenu"));

        $(".popup").fadeIn(1000).delay(1000).fadeOut(1000);
        var quantity= 0;
        var giapresente = false;
        var name = $(this).text().trim();
        name = name.substring(0,name.length-1); // delete due punti

        var arrayHamburger = Object.keys(allmenu);
        for (let i = 0; i < arrayHamburger.length; i++) {
          if(arrayHamburger[i] == name){
            giapresente = true;
            break;
          }
          
          
        }
        if(giapresente){
          allmenu[name]["quantity"] += 1;
        }else{
          var ingredients = $(this).next().eq(0).text().trim();
          ingredients = ingredients.substring(0, ingredients.length-1);//rimuovo il punto finale
          var price = 6;
  
          console.log(ingredients);
          allmenu[name] = {"ingredients": ingredients, "price": price, "quantity": ++quantity}; 
        }
        localStorage.setItem("allmenu", JSON.stringify(allmenu));

        

        
      })
    })
    
}

function msgNoReload(id_class){
  var modal = $("#"+ id_class);
  var span = $(".close");

  modal.css("display","block");
  span.click(function(){
    modal.css("display","none");
  })

  window.onclick = function(event) {
    var idEvent = $(event.target).eq(0).attr("id");
    var idModal = modal.eq(0).attr("id");

    if (idEvent == idModal) {
      modal.css("display","none");

    }
  }
}

function msg(id_class){
  var modal = $("#"+id_class);
  var span = $(".close");

  modal.css("display","block");

  span.click(function(){
    modal.css("display","none");
    location.reload();
  })

  window.onclick = function(event) {
    var idEvent = $(event.target).eq(0).attr("id");
    var idModal = modal.eq(0).attr("id");

    if (idEvent == idModal) {
      location.reload();

    }
  }
}





function showOnHamburger(ing){
    var textingredient = ing.id;
    // var i = $(".nelpanino").children();
    var i = $(".nelpanino > #"+textingredient);
  
    i.show();
  
    switch (i.attr("id")) {    
      case "salad":i.css("background", "linear-gradient(90deg, rgba(35,255,0,1) 0%, rgba(255,255,255,0) 100%)")
        break;
      case "meat":i.css("background", "linear-gradient(90deg, rgba(99,0,0,1) 0%, rgba(255,255,255,0) 100%)")
        break;
        case "pickle":i.css("background","linear-gradient(90deg, rgba(34,78,0,1) 0%, rgba(255,255,255,0) 100%)")
        break;
        case "pickle_sauce":i.css("background","linear-gradient(270deg, rgba(34,78,0,1) 0%, rgba(255,255,255,0) 100%)")
        break;
        case "ketchup":i.css("background","linear-gradient(270deg, rgba(255,0,0,1) 0%, rgba(255,255,255,0) 100%)")
        break;
        case "tomato":i.css("background","linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(255,255,255,0) 100%)")
        break;
        case "bacon":i.css("background","linear-gradient(180deg, rgba(180,31,31,1) 0%, rgba(246,86,86,1) 13%, rgba(238,191,119,1) 48%, rgba(229,59,59,1) 75%, rgba(159,19,19,1) 100%)")
        break;
        case "egg":i.css("background","linear-gradient(90deg, rgba(255,255,255,1) 15%, rgba(255,166,49,1) 50%, rgba(255,255,255,1) 85%)")
        break;
        case "pineapple":i.css("background","linear-gradient(90deg, rgba(255,236,137,1) 0%, rgba(255,255,255,0) 100%)")
        break;
        case "cheddar":i.css("background","#ff8800")
        break;
        case "onion":i.css("background","linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(160,90,142,1) 10%, rgba(255,255,255,1) 21%, rgba(160,90,142,1) 49%, rgba(255,255,255,1) 87%, rgba(160,90,142,1) 100%)")
        break;
        case "gouda":i.css("background","linear-gradient(270deg, rgba(255,255,255,0) 0%, rgba(255,205,103,1) 100%)")
        break;
        case "mushroom":i.css("background","linear-gradient(270deg, rgba(255,255,255,0) 0%, rgba(119,103,84,1) 100%)")
        break;
        case "grilled_peppers":i.css("background","linear-gradient(270deg, rgba(56,255,0,0.3841911764705882) 0%, rgba(255,0,0,1) 100%)")
        break;
      default:
        break;
    }
    increment(1);
  
  
  
}

function hideOnHamburger(ing){
    var textingredient = ing.id;
    var i = $(".nelpanino > #"+textingredient);
    i.hide();
    increment(-1);
}
  
function increment(n){
    limit += n;
}