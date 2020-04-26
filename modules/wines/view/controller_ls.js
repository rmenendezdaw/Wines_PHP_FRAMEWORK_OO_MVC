$(document).ready(function() {
    $('.modal_list').on("click", function() {
        var id = this.getAttribute('id');
        // console.log(id);

        // $.get("module/wines/controller/controller_wines.php?op=read_modal&modal=" + id, 
        // function (data, status) {
        //     // console.log(data);
        //     var json = JSON.parse(data);
            $.ajax({

                type: "GET",
                dataType: "JSON",
                url: "module/wines/controller/controller_wines.php?op=read_modal&modal=" + id,
            })
            
            .done(function(data) {
                $('<div></div>').attr('id','details_wine','type','hidden').appendTo('#wine_modal');
                $('<div></div>').attr('id','container').appendTo('#details_wine');
                $('#container').empty();
                $('#name').html(data.name);
                $('<div></div>').attr('id','Div1').appendTo('#container');

                $("#Div1").html(
                    '<br><span>Name:   <span id="name">'+data.name+'</span></span></br>'+
                    '<br><span>Code:   <span id="code">'+data.code+'</span></span></br>'+
                    '<br><span>Mark:     <span id="mark">'+data.mark+'</span></span></br>'+
                    '<br><span>Type:     <span id="type">'+data.type+'</span></span></br>'+
                    '<br><span>Grades:     <span id="grades">'+data.grades+'</span></span></br>'+
                    '<br><span>Origin:     <span id="origin">'+data.origin+'</span></span></br>'+
                    '<br><span>Year:    <span id="year">'+data.year+'</span></span></br>'
            )
            modal(data);
                })
    });
});

     
function modal (data) {
    

                $("#details_wine").show();
                $("#container").dialog({
                    title:data.name,
                    width: 850, //<!-- ------------- ancho de la ventana -->
                    height: 500, //<!--  ------------- altura de la ventana -->
                    //show: "scale", <!-- ----------- animación de la ventana al aparecer -->
                    //hide: "scale", <!-- ----------- animación al cerrar la ventana -->
                    resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
                    //position: "down",<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
                    modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) --> modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
                    buttons: {
                        Ok: function () {
                            $(this).dialog('close');
                        },
                        Update: function() {
                            
                            window.location = "index.php?page=controller_wines&op=update&id="+data.code;
                            
                        },
                        Delete: function(){
                            window.location ="index.php?page=controller_wines&op=delete&id="+data.code;
                        }
                    },
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    }
    });
}
$(document).ready(function() {
    // console.log("dist");

        $('#crudtable').DataTable();

        

});
