function addCart(){
    
    $(document).on("click", ".addCart", function(){
    var id = $(this).attr("id");
    // console.log(id);
    parseCart(id);
    })
    $(document).on("change", "#qty", function(){
        var id = $('.addCart').attr("id");
        var qty= $(this).val();
        // console.log(qty);
        changeQty(id,qty);
        })
}
function parseCart(id){
    selQty = $('#qty').val() || 1;
    cart = [];
    Qty = [];
    if (localStorage.cart){
        cart = JSON.parse(localStorage.cart);
        Qty = JSON.parse(localStorage.qty);
    }
    for (row in cart){
        // console.log(cart[row]);
        if (cart[row]===id){
            return;
        }
    }
    Qty.push(selQty);
    cart.push(id);
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("qty", JSON.stringify(Qty));
}
function changeQty(id,qty){

    cont=0;
    cart = JSON.parse(localStorage.cart);
    Qty = JSON.parse(localStorage.qty);
    if (cart.includes(id)){
        for (row in cart){
            if (cart[row]===id){
                break;
            }
            cont++;
        }
    }else{
        return;
    }
    // console.log(cont);
    Qty[cont]=qty;
    localStorage.setItem("qty", JSON.stringify(Qty));
}
function save_cart(){
   return new Promise(function(resolve){

        $.ajax({
            type:"POST",
            url: "module/cart/controller/controller_cart.php?op=saveCart",
            dataType: 'JSON',
            data: {cart:JSON.parse(localStorage.getItem('cart')), Qty: JSON.parse(localStorage.getItem('qty'))}
        })
        .done(function(data){
            console.log(data);
            resolve();

        })
        .fail(function(){
            resolve();
        })
   })
        
}
$(document).ready(function(){
    addCart();
})