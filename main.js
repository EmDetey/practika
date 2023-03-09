$(document).ready(function(){
    
 $(".onCorz").on("click",function(e){
    e.preventDefault()
    $.ajax({
        url:"/korx.php",
        method:"get",
        data: $(this).serialize(),
        success: function(data){
            confirm.log("sd")
        }
    })
 })

    

})