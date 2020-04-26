
function searchType(){
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "module/search/controller/controller_search.php?op=type",
    })
    .done(function(data) {
        // console.log(data);
        var $search = $("#searchType");
        $search.empty();
        $search.append("<option value=false>Select Type</option>");      
        
        for (row in data){
            // console.log(data[row].type);

            $search.append("<option>"+ data[row].type + "</option>");
        }
    })
    .fail(function() {
        console.log("fail");

    });
}
function searchMark(url){
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: url,
    })
    .done(function(data) {
        // console.log(data);
        var $search = $("#searchMark");
        $search.empty();
        $search.append("<option value=false>Select Mark</option>");      
        
        for (row in data){
            // console.log(data[row].mark);
            $search.append("<option>"+ data[row].mark+ "</option>");
        }
    })
    .fail(function() {
        console.log("fail");

    });
}

function searChange(){
    $("#searchType").on ("change", function () {
        var valType = $(this).val();
        console.log($(this).val());
        searchMark("module/search/controller/controller_search.php?op=demand&com="+valType);
    });
}
function autoComplete(){
    $('<div></div>').attr({'class':'autoElement'}).appendTo('#autoOptions');
    $("#textAuto").on ("keyup", function(){
        var auto=$(this).val();
        var valType = $('#searchType').val();
        var autoCom = {auto: auto, valType: valType};
        
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "module/search/controller/controller_search.php?op=autocomplete",
            data: autoCom,
        })
        .done(function(data) {
            $('#autoOptions').empty();

            $('#autoOptions').fadeIn(1000);
            for (row in data){
                console.log(data[row].name);
                $('<div></div>').attr({'class':'autoElement', "data": data[row].type, "id": data[row].name, "style":"background-color:white;"}).appendTo('#autoOptions').html(
                    data[row].name
                );
            }
            $('.autoElement').on ('click' , function(){
                var id =this.getAttribute('id');
                console.log(id);
                $('#textAuto').val(id);
                $('#autoOptions').fadeOut(1000);
            });

        })
        .fail(function() {
           console.log("Fail from Ajax");
    
        });
    });
}
function btnSearch(){
    $('#searchList').on ('click' , function(){
        var type = $('#searchType').val();
        var mark = $('#searchMark').val();
        var auto = $('#textAuto').val();
    if(type=='false' && mark=='false'&&auto==''){
        alert("You cannot find products with empty query");
    }else{

        localStorage.setItem('type_search', type);
        localStorage.setItem('mark', mark);
        localStorage.setItem('val', auto);

        console.log(localStorage.getItem('val'));

        if((type=="")&&(mark=="")&&(auto=="")){
            toastr["info"]("Insert research"),{"iconClass":'toast-info'};
        }else{

            setTimeout(window.location.href="index.php?page=controller_shop&op=list",1000);
        }
    }
    })
}
function allSearch(){
    searchType();
    searchMark("module/search/controller/controller_search.php?op=mark");
    searChange();
    autoComplete();
    btnSearch();

}
$(document).ready(function () {
    allSearch();

});