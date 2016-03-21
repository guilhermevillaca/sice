(function($){

	isEmpty = function (field, msgIn, msgOut)
    {

        var a = $("#"+field).val(); 
        
        if (a == "") {
            $("#"+field).attr("placeholder", msgIn);
            $("#"+field).addClass("error");
            setTimeout(function() {                    
                $("#"+field).attr("placeholder", msgOut);
                $("#"+field).removeClass("error");                                                      
                $("#"+field).focus();
            }, 3000);                
            return true;
        }else{
            return false;
        }
    }

    isEmail = function (field, msgIn, msgOut)
    {

        var e = $("#"+field).val(); 

        if (e.indexOf('@') == 0 || e.indexOf('.') == -1) {   
            $("#"+field).val("");
            $("#"+field).attr("placeholder", msgIn);  
            $("#"+field).addClass("error");                  
            setTimeout(function() {
                $("#"+field).removeClass('error');
                if(e != "")
                    $("#"+field).val(e);
                else
                    $("#"+field).val("placeholder", msgOut);
                $("#"+field).focus();                                      
            }, 3000);
            
            return true;

        }else{
            return false;
        }

    }

}(jQuery));