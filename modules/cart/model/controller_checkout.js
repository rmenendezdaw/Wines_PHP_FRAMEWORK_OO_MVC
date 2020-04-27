function listCart(){
    var cont=0;
    var data={cart: JSON.parse(localStorage.getItem('cart'))};
    var total=0;
    var total_prod=0;
    var qty= JSON.parse(localStorage.getItem('qty'));
    var cart= JSON.parse(localStorage.getItem('cart'));

     $.ajax({
         type: "POST",
         dataType: "JSON",
         url: "module/cart/controller/controller_cart.php?op=listCart",
         data: data
     })
     .done(function(data){
        //  console.log(data);
         for (row in data ){
            for (row2 in cart){
                console.log(data[row].code);
                if (cart[row2]===data[row].code){
                    cont=row2;
                    console.log(cont);

                }
            }
            //  console.log(data[row]);
             total_prod=parseFloat(data[row].price)*parseFloat(qty[cont]);
             total=total+total_prod;
            //  console.log(total_prod);
            
            var paint = "<tr><td>"+data[row].name+"</td><td>"+data[row].mark+
            "</td><td>"+data[row].type+"</td><td>"+data[row].price+"</td><td>"+qty[cont]+"</td><td>"+total_prod+"</td>"
            $("#bodyCart").append(paint);
        }
            $("#bodyCart").append("<hr><span>TOTAL<br>"+total+"</span>");

     })
     .fail(function(){
         console.log("ListCart ajax error");
         $("#cart").css("visibility", "hidden");
         return;
     })

}
function deleteCart(){

    $(document).on('click', '#deleteCart', function(){
        localStorage.removeItem('cart');
        localStorage.removeItem('qty');
        $('#cart').empty();
        $('#cart').html('<h1>There are not any products</h1>');

    })
    console.log(JSON.parse(localStorage.getItem('cart')));
    $cart=JSON.parse(localStorage.getItem('cart'));
    if (!$cart>0){
        $('#cart').empty();
        $('#cart').html('<h1>There are not any products</h1>');
    }
}
function checkout(){
    $('#addcart').on('click', function(){
    
        MyPromise("POST","module/cart/controller/controller_cart.php?op=checkOut","JSON", {cart: JSON.parse(localStorage.getItem('cart')), Qty: JSON.parse(localStorage.getItem('qty'))})
        .then(function(data){
            localStorage.removeItem('cart');
            localStorage.removeItem('qty');
            alert('Successfull purchase');
            location.reload();

        })
        .catch(function(error){
            console.log(error);
            if (error==='noUser'){
                localStorage.setItem('purchase', 'on');
                window.location= "index.php?page=controller_login&op=login";
            }else{
                console.log('No money');
            }
        })
    })
  
}
$(document).ready(function(){
    $('header').remove();
    listCart();
    deleteCart();
    checkout();

})