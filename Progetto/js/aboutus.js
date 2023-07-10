function about(){
    var component = $(".component");
    component.find("#manager").hover(function(){
        $("#image-manager").css("display","block");
    },
    function(){
        $("#image-manager").css("display","none");
    })

    component.find("#hall").hover(function(){
        $("#image-hall").css("display","block");
    },
    function(){
        $("#image-hall").css("display","none");
    })

    component.find("#chef").hover(function(){
        $("#image-chef").css("display","flex");
    },
    function(){
        $("#image-chef").css("display","none");
    })

    component.find("#waiters").hover(function(){
        $("#image-waiters").css("display","flex");
    },
    function(){
        $("#image-waiters").css("display","none");
    })
    
}