
var time = null;
function game(){
    var cardObj = [
    {
        nameHamburger: "bacon",
        img:"../img/Bacon.jpg",
    },
    {
        nameHamburger: "bacon",
        img:"../img/Bacon.jpg",
    },
    {
        nameHamburger: "baconcheese",
        img:"../img/Baconcheese.jpg",
    },
    {
        nameHamburger: "baconcheese",
        img:"../img/Baconcheese.jpg",
    },
    {
        nameHamburger: "cheese",
        img:"../img/chese.jpg",
    },
    {
        nameHamburger: "cheese",
        img:"../img/chese.jpg",
    },
    {
        nameHamburger: "chicken",
        img:"../img/chickenl.jpg",
    },
    {
        nameHamburger: "chicken",
        img:"../img/chickenl.jpg",
    },
    {
        nameHamburger: "hamburger",
        img:"../img/Hamburger.jpg",
    },
    {
        nameHamburger: "hamburger",
        img:"../img/Hamburger.jpg",
    },
    {
        nameHamburger: "veggy",
        img:"../img/veggy.jpg",
    },
    {
        nameHamburger: "veggy",
        img:"../img/veggy.jpg",
    },
    {
        nameHamburger: "cardhamburger",
        img:"../img/cartHamb.jpg",
    },
    {
        nameHamburger: "cardhamburger",
        img:"../img/cartHamb.jpg",
    },
    {
        nameHamburger: "chips",
        img:"../img/chips.jpg",
    },
    {
        nameHamburger: "chips",
        img:"../img/chips.jpg",
    },
    {
        nameHamburger: "sand",
        img:"../img/sand.jpg",
    },
    {
        nameHamburger: "sand",
        img:"../img/sand.jpg",
    },
    {
        nameHamburger: "hot",
        img:"../img/hot.jpg",
    },
    {
        nameHamburger: "hot",
        img:"../img/hot.jpg",
    }

    ];
    $("#button-start").click(function(){
        $(this).text("NEW GAME");

        var card = $(".cardgame");
        card.children().remove();
        var userCard = []; //string array name of hamburger
        var userCardId= [];//int array 
        var found = []; //array string card found

        shuffle(cardObj);

        
        for (let i = 0; i < cardObj.length; i++) {
            card.append( "<img src=\"../img/LOGO.png\" id=\""+i+"\"></img>" );
        }
        //resetto il timer 
        clearInterval(time);
        countdown();


    
        card.children().click(function(){
            
            var cardId = $(this).attr("id");
    
    
            if(userCardId.indexOf(cardId) == -1){//there is no equals ID into userCardId
    
            
                userCard.push(cardObj[cardId].nameHamburger);
                userCardId.push(cardId);
                
            }
    
            
            if(userCardId.length<=2){
                $(this).attr("src", cardObj[cardId].img); // flip image hamburger
    
            }
            
    
            if(userCard.length == 2){
                setTimeout(function(){
                    
                    var clickId1 = userCardId[0];
                    var clickId2 = userCardId[1];
                    var clickName1 = userCard[0];
                    var clickName2 = userCard[1];
                    if(clickName1 == clickName2 && clickId1 != clickId2){
                        
                        $("#"+ clickId1).css("opacity", "0");
                        $("#"+ clickId2).css("opacity", "0");
                        $("#"+ clickId2).off();
                        $("#"+ clickId1).off();
                        found.push(userCard);
                    }else{
                        $("#"+ clickId1).attr("src", "../img/LOGO.png");
                        $("#"+ clickId2).attr("src", "../img/LOGO.png");
                    }
    
                    userCard = [];
                    userCardId = [];
    
                    if(found.length == cardObj.length/2){
                        msg("gameWin");
                        clearInterval(time);

                    }
                }, 700)
            }
            
            
        })
    })
    
}

function msgNoReloadNoClick(id_class){
    var modal = $("#"+ id_class);
    var span = $(".close");

    modal.css("display","block");
    span.click(function(){
        modal.css("display","none");
    })
}


function shuffle(array) {
    for (let i = array.length-1 ; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function countdown(){
    var timeleft = 45;
    $("#countdown").css("color","black")
    time = setInterval(function(){
        timeleft--;
        $("#countdown").text(timeleft);
        if(timeleft <= 0){
            msgNoReloadNoClick("gameLost");
            $(".cardgame").children().off( "click" )
            clearInterval(time);
        }else if(timeleft == 15){
            $("#countdown").css("color","red").fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200);
        }
    },1000);

}

