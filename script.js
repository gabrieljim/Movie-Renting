$(document).ready(function() {
    $('.pelis').children().addClass("peli");
    $("#add").removeClass("peli");
    
    $(".peli").on("click", function() {
        $(".peli").removeClass("clickeada");
        $(this).addClass("clickeada");
        let id = $(this).attr("id");
        $(".forma").hide();
        $(".detalles").show();
        $.getJSON('lista.json')         
        .done(
            function(data) {
                for(let i = 0; i < data.length; i++) {
                    if (data[i]["nombre"] == id) {
                        $("span#nombre").html(data[i]["nombre"]);
                        $("span#year").html("Hecha en " + data[i]["year"]);
                        $("span#director").html("Dirigida por " + data[i]["director"]);
                        $("span#precio").html("Precio: "+ data[i]["precio"]);
                        $("span#alquilada").html("Alquilada: " + (data[i]["alquilada"] == "true" ? "Si" : "No"));
                        break;
                    }
                }
            }
        );
    });

    $("#add").on("click", function() {
        $(".detalles").hide();
        $(".forma").show();
        $(".peli").removeClass("clickeada");
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
        window.location.reload(); 
    });
});
