$(document).ready(function() {
    $('.pelis').children().addClass("peli");
    $("#add").removeClass("peli");
    
    function mostrarLista(peliculas){
    $(".peli").on("click", function() {
        let id = $(this).attr("id");
        $(".forma").hide();
        $(".detalles").show();
        $.getJSON('lista.json')         
        .done(
            function(data) {
                for(let i = 0; i < data.length; i++) {
                    if (data[i]["nombre"] == id) {
                        $("h1#nombre").html(data[i]["nombre"]);
                        $("h2#year").html(data[i]["year"]);
                        $("h3#director").html(data[i]["director"]);
                        $("h4#precio").html("Precio: "+ data[i]["precio"]);
                        $("h4#alquilada").html(data[i]["alquilada"]);
                        break;
                    }
                }
            }
        );
    });

    $("#add").click(function() {
        $(".detalles").hide();
        $(".forma").show();
    });

    $('#forma').on("submit", function () {
        var formData = {
            'nombre':$('input[name="nombre"]').val(),
            'year':$('input[name="year"]').val(),
            'director':$('input[name="director"]').val(),
            'precio':$('input[name="precio"]').val(),
            'alquilada':$('input[name="alquilada"]:checked').val(),
            'devolucion':$('input[name="devolucion"]').val(),
        }

        $.ajax({
            type:'POST',
            url: 'añadir.php',
            data: formData,
            dataType: 'json',
            encode:true
        });
    });
};
