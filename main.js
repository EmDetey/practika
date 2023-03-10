$(document).ready(function(){
    
 $(".onCorz").on("click",function(e){
    e.preventDefault()
    
    $.ajax({
        url:"/korx.php",
        method:"post",
        data: {'tovarId': $(this).find('.tovarId').val(),

        'tovarImg':$(this).find('.tovarImg').val(),
        'tovarTitle':$(this).find('.tovarTitle').val(),
        'tovarPrice':$(this).find('.tovarPrice').val()
    },
        success: function(data){
            console.log(data)
            
        }
    })
 })

let switcher_k = false
const korz_item = document.querySelector('.korz-item')
const korz = document.querySelector('.korz')
korz_item.addEventListener("click",function(){
    if(switcher_k == false){
        korz.style="transition-duration:0.5s; top:0; color:red;";
        korz_item.textContent = "Закрыть"
        korz_item.style = "color:red;"
        switcher_k = true
    }
    else{
        korz.style="transition-duration:0.5s; top:-500%; color:green;";
        korz_item.textContent = "Корзина"
        korz_item.style = "color:green;"
        switcher_k = false
    }
   

})
    

})