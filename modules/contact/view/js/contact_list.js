// function initMap() {
//     var ontinyent = {lat: 38.8220593, lng: -0.6063927};
//     var map = new google.maps.Map(document.getElementById('map'), {
//         zoom: 10,
//         center: ontinyent
//     });
//     var contentString = '<div id="content">'+
//         '<div id="siteNotice">'+
//         '</div>'+
//         '<h1 id="firstHeading" class="firstHeading">Here!</h1>'+
//         '<div id="bodyContent">'+
//         '<p><b>Ontinyent</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
//         'sandstone rock formation in the southern part of the '+
//         'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
//         'south west of the nearest large town, Alice Springs; 450&#160;km '+
//         'Heritage Site.</p>'+
//         '<p>Attribution:<b> IES LESTACIÓ</b>, <a href="http://www.iestacio.com/</a> '+
//         '(last visited Feb 25, 2020).</p>'+
//         '</div>'+
//         '</div>';

//         var infowindow = new google.maps.InfoWindow({
//             content: contentString
//             });

//             var marker = new google.maps.Marker({
//             position: ontinyent,
//             map: map,
//             title: 'Ontinyent'
//             });
//             marker.addListener('click', function() {
//             infowindow.open(map, marker);
//             });
// }
function valContact(){
    $(document).on('click','#send_contact',function(){
        result = true;
        $(".error").remove();
        var pname = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;
	    var pmessage = /^[0-9A-Za-z\s]{20,100}$/;
        var pmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        
        if ($("#cname").val() === "" || $("#cname").val() === "Introduce your name" ) {
			$("#cname").focus().after("<span class='error'>Introduce your name</span>");
			return false;
		}else if (!pname.test($("#cname").val())) {
			$("#cname").focus().after("<span class='error'>The name has a minimum of 3 characters</span>");
			return false;
		}
		if ($("#cemail").val() === "" || $("#cemail").val() === "Introduce your email" ) {
			$("#cemail").focus().after("<span class='error'>Introduce your email</span>");
			return false;
		}else if (!pmail.test($("#cemail").val())) {
			$("#cemail").focus().after("<span class='error'>The email format is incorrect</span>");
			return false;
		}
		if ($("#matter").val() === "Select a subject" ) {
			$("#matter").focus().after("<span class='error'>Select a subject</span>");
			return false;
		}
		if ($("#message").val() === "" || $("#message").val() === "Select a subject" ) {
			$("#message").focus().after("<span class='error'>Introduce your message</span>");
			return false;
		}else if (!pmessage.test($("#message").val())) {
			$("#message").focus().after("<span class='error'>The message has a minimum of 20 characters</span>");
			return false;
        }
        ajaxContact(result);
    })
}
function ajaxContact(result) {
console.log("hola");
    if (result) {
        $('#send_contact').attr('disabled', true);
        var data = {"cname":$("#cname").val(),"cemail":$("#cemail").val(),"matter":$("#matter").val(),"message":$("#message").val()};
        console.log(data);

        $.ajax({
            type: "POST",
            url: "http://localhost/Wines_PHP_FRAMEWORK_OO_MVC/index.php?module=contact&function=send_contact",
            dataType: 'JSON',
            data: data
        })
        .done(function(data){
            console.log(data);
        })
        .fail(function(error){
            console.log(error);
        })
    }
    
}
$(document).ready(function(){
    // if(document.getElementById("map") != null){
    //     var script = document.createElement('script');
    //     script.src = "https://maps.googleapis.com/maps/api/js?key="+API_KEY_MAPS+"&callback=initMap";
    //     script.async;
    //     script.defer;
    //     document.getElementsByTagName('script')[0].parentNode.appendChild(script);
    //   }

    valContact();


    })
      
