function signin(){
    $("#err").hide();
    $("#signin-btn").click(function(e){
        var form = {
            'firstname': $('input[name=firstname]').val(),
            'lastname': $('input[name=lastname]').val(),
            'age': $('input[name=age]').val(),
            'email': $('input[name=email]').val(),
            'username': $('input[name=username]').val(),
            'password': $('input[name=password]').val(),
            'repeatpassword': $("input[name=reppassword]").val(),
        };
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../php/user/signup.php",
            data: {info:JSON.stringify(form)},
            datatype: 'json',
            success: function(data){
                var arr = JSON.parse(data);
                var htmlerr = $("#err").find("span");
                if(htmlerr.length){
                    htmlerr.remove();
                }
                if(arr["errorpassword"]=="true"){
                    $("#err").show();
                    $("#err").append("<span>The password must be the same</span>");
                }else if(arr["errorpassword"]=="pattern"){
                    $("#err").show();
                    $("#err").append("<span>The Password must contain at least one number, one uppercase and lowercase letter, 8 or more characters</span>");
                }else if(arr["errorpassword"]=="empty"){
                    $("#err").show();
                    $("#err").append("<span>Empty fild, fill fields please</span>");
                }else if(arr["errorpassword"]=="false"){
                    location.replace("../php/site.php");
                }else if(arr["errorname"] == "pattern"){
                    $("#err").show();
                    $("#err").append("<span>Please enter a valid name</span>");
                }else if(arr["errmail"] == "true"){
                    $("#err").show();
                    $("#err").append("<span>Invalid email format</span>");
                }
            }

        })
    })
}