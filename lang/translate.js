
function langChange(lang){
    // console.log("hi");
    lang = lang || localStorage.getItem('app-lang') || 'en';
    localStorage.setItem('app-lang', lang);

    var elements = document.querySelectorAll('[data-tr]');
    // console.log(lang);
    $.ajax({
        
        url: 'lang/' + lang + '.json', 
        type: 'POST',
        dataType: 'JSON',
        success: function(data) {
            for (var i = 0; i < elements.length; i++){
                elements[i].innerHTML = data.hasOwnProperty(lang) ? data[lang][elements[i].dataset.tr] : elements[i].dataset.tr;
            }

        }
    })
}
$(document).ready(function() {
    langChange();
    $("#btn-es").on("click", function() { langChange('es') });
    $("#btn-en").on("click", function() { langChange('en') });
    $("#btn-va").on("click", function() { langChange('va') });
  });


  // text = {
//     "es": {
//         "Homepage" : "Inicio",
//         "Wines" : "Vinos",
//         "Services" : "Servicios",
//         "About Us" : "Sobre nosotros",
//         "Contact Us" : "Soporte",
//         "Name" : "Nombre",
//         "Code" : "Codigo",
//         "Mark" : "Marca",
//         "Grades" : "Alcohol",
//         "Type of Wine" : "Tipo de Vino",
//         "Type of Grapes" : "Tipo de Uva",
//         "Origin" : "Origen",
//         "Imported" : "Importado",
//         "Year" : "Año",
//         "Create Wine" : "Crear Vino",
//         "Update Wine" : "Modificar Vino",
//         "Spanish" : "Español",
//         "English" : "Inglés",
//         "Valencian" : "Valenciano"
//     },
//     "va": {
//         "Homepage" : "Inici",
//         "Wines" : "Vins",
//         "Services" : "Serveis",
//         "About Us" : "Sobre moatros",
//         "Contact Us" : "Contactens",
//         "Name" : "Nom",
//         "Code" : "Codi",
//         "Mark" : "Marca",
//         "Grades" : "Alcohol",
//         "Type of Wine" : "Tipo de Vi",
//         "Type of Grapes" : "Tipo de raim",
//         "Origin" : "Orige",
//         "Imported" : "Importat",
//         "Year" : "Any",
//         "Create Wine" : "Crear Vi",
//         "Update Wine" : "Modificar Vi",
//         "Spanish" : "Espanyol",
//         "English" : "Anglés",
//         "Valencian" : "Valenciá"
//     }
// }
    


  // window.onload = function(){
  //   langChange();
  //   document.getElementById('btn-es').addEventListener('click', langChange.bind(null, 'es'));
  //   document.getElementById('btn-en').addEventListener('click', langChange.bind(null, 'en'));
  //   document.getElementById('btn-va').addEventListener('click', langChange.bind(null, 'va'));
  // }