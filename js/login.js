window.onload = login;

function login(){
    
    $("#login-btn").click(function(e){
        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "php/user/login.php",
            data: { info: JSON.stringify({
                        username: $("input[name=username]").val(),
                        password: $("input[name=password]").val(),
                    })
                
            },
            datatype: "json",
            success: function(data){
                var arr = JSON.parse(data);
                var htmlerr = $("#err").find("span");
                if(htmlerr.length){
                    htmlerr.remove();
                }
                if(arr["errUserOrPass"]=="true"){
                    $("#err").show();
                    $("#err").append("<span>Incorrect user name and/or password.</span>")
                }else if(arr["empty"] == "true"){
                    $("#err").show();
                    $("#err").append("<span>Empty Field</span>")
                }else if(arr["ok"] == "true"){
                    location.replace("php/site.php")
                }
            }
        })
    })

    
}