function modify(){
    $("#informa, .fa-address-card").click(function(){
        window.location = "../php/myprofile.php";
    })


    $("#modify").click(function(){
        $(this).toggleClass("modifyActive").delay(1000).hide();
        if($(this).hasClass("modifyActive")){
          $(".modifyActive").css({
            "margin-top": "490px",
            "margin-left": "-120px",
          });
        }else{
          $(this).css({
            "margin-top": "30px",
            "margin-left": "160px",
          });
        }
        

        $(".hiddenmodify").toggle("slow",function(){
            $("#modify").show();
        });

    })
    
    insertNewInfoDB();
    removeAccount();
    

}
function removeAccount(){
    $("#remove-account").click(function(){
        var modal = $("#rem-account");
  

        modal.css("display","block");

        $("#cancbtnrem").click(function(){
            modal.css("display","none");
        })
    })

}

function insertNewInfoDB(){
    $("#modifydb").click(function(e){
        var form = {
            'first_name': $('input[name=firstname]').val(),
            'last_name': $('input[name=lastname]').val(),
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
            'repeatpassword': $("input[name=reppassword]").val(),
        };
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../php/user/modify.php",
            data: {info:JSON.stringify(form)},
            datatype: 'json',
            success: function(data){
                
                var arr = JSON.parse(data);
                
                if(arr["errorpassword"] == "false"){
                    msg("hiddenmsgok");
                }else if(arr["errorpassword"] == "true"){
                    msgNoReload("hiddenmsgfall");
                }else if(arr["errorpassword"] == "empty"){
                    msgNoReload("hiddenmsgempty");
                }else if(arr["errorpassword"] == "pattern"){
                    msgNoReload("patternErr");
                }else if(arr["errmail"] == "true"){
                    msgNoReload("mailinvalid");
                }else if(arr["errname"] == "true"){
                    msgNoReload("errname");
                }else if(arr["errlastname"] == "true"){
                    msgNoReload("errname");
                }
            },
        })
    });
}


