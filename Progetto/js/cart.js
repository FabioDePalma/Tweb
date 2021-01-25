var allmenu = JSON.parse(localStorage.getItem("allmenu"));



function cart(){
    $("#cart").click(function(){
    
        window.location = "../php/cart.php";
        
        
    })
    

    for (var key in allmenu) {

        if(allmenu[key]["quantity"] > 0 ){
            insertHtml(allmenu[key], key);
        }
    }

    $(".cart-content").each(function(){
        var namehamburger = $(this).find(".ingre").find("span").first().text();
        var frame = $(this).find(".quantity").find("input");//oggetto jquery
        var price =  allmenu[namehamburger]["price"];
        frame.val(allmenu[namehamburger]["quantity"]);//salvo il valore dalla localstorage nel blocchetto/bottone
        var numIntoFrame = parseInt(frame.val());//valore effettivo 
        frame.parent().parent().find(".price").text(price*numIntoFrame); //prezzo "apparente" sul lato destro
    })

    $(".minus-btn").click(function(){
        var namehamburger = $(this).parent().siblings(".ingre").find("span").first().text();
        var price = allmenu[namehamburger]["price"];
        var frame = $(this).siblings().first();//oggetto jquery
        frame.val(allmenu[namehamburger]["quantity"]);//salvo il valore dalla localstorage nel blocchetto/bottone
        frame.val(--allmenu[namehamburger]["quantity"]);
        localStorage.setItem("allmenu", JSON.stringify(allmenu));

        var numIntoFrame = parseInt(frame.val());//valore effettivo 
        if(numIntoFrame == 0){
            $(this).parent().parent().remove();
        }
        
        var oldprice = frame.parent().parent().find(".price").text().trim();//salvo il vecchio prezzo 
        frame.parent().parent().find(".price").text(oldprice-price);//sostituisco con la differenza

        //stampo total in basso
        total();
    })

    $(".plus-btn").click(function(){
    var namehamburger = $(this).parent().siblings(".ingre").find("span").first().text();
    var price = allmenu[namehamburger]["price"];
    var frame = $(this).siblings();//oggetto jquery

    frame.val(allmenu[namehamburger]["quantity"]);//salvo il valore dalla localstorage nel blocchetto
    frame.val(++allmenu[namehamburger]["quantity"]);
    localStorage.setItem("allmenu", JSON.stringify(allmenu));
    var numIntoFrame = parseInt(frame.val());//valore effettivo 
    frame.parent().parent().find(".price").text(price*numIntoFrame);//sostituisco con la moltiplicazione

    //stampo total in basso
    total();

    })

    //clear storage and you will be redirect when click reset
    $("#reset").click(function(){
        localStorage.clear();
        var modal = $("#hiddenmessage");

        modal.css("display","block");
        
        
        setTimeout(function(){
            window.location = "../php/site.php"

        }, 1500);
    })

    total();
    $("#pay").click(total);

    
}
function total(e){
    $.ajax({
        type: "POST",
        data: {cart:JSON.stringify(allmenu)},
        url: "../php/user/checkout.php",
        success: function(data){

            e = e || window.event;

            var target = e.target.id;

            var arr = JSON.parse(data);
            
            $(".total-price").find("span").find("span").remove();
            $(".total-price").find("span").append("<span>"+arr["total"]+"</span>");
            
            if(arr["total"] == "false"){
                msg("cartmsgerr");
            }else if(target=="pay"){
                
                cartMsg(arr["total"]);

            }
            
        },
    })
}


function cartMsg(total){
    var stringa = "<div id=\"cartmsg\" class=\"modal\"><div class=\"modal-content\"><span class=\"close\">&times;</span><p>you payed:"+ total + "</p></div></div>";
    $("#divcart").append(stringa);

    var modal = $("#cartmsg");

    var span = $(".close");

    modal.css("display","block");

    span.click(function(){
        modal.css("display","none");
        localStorage.clear();
        window.location = "../php/site.php"
        
    })
}

function insertHtml(elementi, nome){
    var str = "<div class=\"cart-content\"><br><div class=\"ingre\"><span>"+nome +"</span><span>:  "+elementi["ingredients"]+"</span></div><div class=\"quantity\"><button class=\"minus-btn\" type=\"button\" name=\"button\">-</button><input type=\"text\" name=\"name\" class=\"value\" value=\"0\"><button class=\"plus-btn\" type=\"button\" name=\"button\">+</button></div><div class=\"price\">"+elementi["price"] +"</div>€</div>";

    $("#divcart").append(str);

}