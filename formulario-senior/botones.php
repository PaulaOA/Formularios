<script> 

    /*BOTÓN PARA GUARDAR PUNTUACIONES*/
    
 var guardarPuntuacionesVacias = false;

$(document).ready(function() {

    var puntuacionesValidas = true;

    $('#btnGuardar').click(function(e) {
        e.preventDefault();

        var nombreEquipo = $('#nombre_equipo').val();

        if (nombreEquipo.trim() === '') {
            $("#modalNombreObligatorio").css("display", "block");
            return;
        } else {
           verificarEquipo(nombreEquipo)
        }

    });

    $("#btnConfirmarGuardar").click(function() {
        $("#modalGuardarVacias").css("display", "none");
        guardarPuntuacionesVacias = true;
        $('#btnGuardar').trigger('click');
    });
});

</script>

<script>

    /* BOTÓN PARA ENVIAR PUNTUACIONES DEFINITIVAS */

$(document).ready(function() {

    $('#btnEnviar').click(function(e) {
        e.preventDefault();

     function validarItemsEspeciales() {
            var llenosPrimerosCuatro = $('input[data-especial="true"]').slice(0, 4).filter(function() {
                return $(this).val() !== '';
            }).length;

            var llenosUltimosCuatro = $('input[data-especial="true"]').slice(4).filter(function() {
                return $(this).val() !== '';
            }).length;

            return (llenosPrimerosCuatro === 4 && llenosUltimosCuatro === 0) || (llenosPrimerosCuatro === 0 && llenosUltimosCuatro === 4);
        }

        var puntuacionesValidas = true;

        var nombreEquipo = $('#nombre_equipo').val();

        if (nombreEquipo.trim() === '') {
            $("#modalNombreObligatorio").css("display", "block");
            return;
        }

        $('input[type="text"].centrado').each(function() {
            if ($(this).hasClass('especial') || $(this).hasClass('puntuacion-automatica')) {
                return true;
            }

            var puntuacion = $(this).val();

            if (puntuacion === '') {
                puntuacionesValidas = false;
                $("#modalPuntuacionesVacias").css("display", "block");
                return false;
            }
        });

        if(puntuacionesValidas) {
            var itemsEspecialesCompletos = validarItemsEspeciales();
                 if (!itemsEspecialesCompletos) {
                    puntuacionesValidas = false;
                    $("#modalItemsEspecialesIncompletos").css("display", "block");
                    return;
                }
        }

        if (puntuacionesValidas) {
            $('input[data-especial="true"]').each(function() {

                var puntuacion = $(this).val();

                if (!(puntuacion == '' || puntuacion == 1 || puntuacion == 2 || puntuacion == 3 || puntuacion == 4 || puntuacion == 5)) {
                    puntuacionesValidas = false;
                    $("#modalValorIncorrecto").css("display", "block");
                    return false;
                }
            });
        } 

        if (puntuacionesValidas) {
            $('input[type="text"].centrado').each(function() {
                if ($(this).hasClass('especial') || $(this).hasClass('puntuacion-automatica')) {
                    return true;
                }

                var puntuacion = $(this).val();

                if (!(puntuacion == 1 || puntuacion == 2 || puntuacion == 3 || puntuacion == 4 || puntuacion == 5)) {
                    puntuacionesValidas = false;
                    $("#modalValorIncorrecto").css("display", "block");
                    return false;
                }
            });
        }

        if (puntuacionesValidas) {
            $("#modalConfirmarEnviar").css("display", "block");
        }
    });


    $('#btnConfirmarEnviar').click(function(e) {
    e.preventDefault();

    var nombreEquipo = $('#nombre_equipo').val();
    var alertMostrado = false;
    var existenRegistros = false;
    var puntuacionGuardada = false;
    var noRegistrado = false;
    var puntuaciones = {};

    var totalGeneral = $('#totalGeneral').val();
    var totalCategoria1 = $('#totalCategoria1').val();
    var totalCategoria2 = $('#totalCategoria2').val();
    var totalCategoria3 = $('#totalCategoria3').val();
    var totalCategoria4 = $('#totalCategoria4').val();
    var totalCategoria5 = $('#totalCategoria5').val();

        $('input[type="text"].centrado').each(function() {
        if (!$(this).hasClass('puntuacion-automatica')) {
            var id = $(this).attr('id');
            var value = $(this).val();
            puntuaciones[id] = value;
        }
    });


        $.ajax({
            type: "POST",
            url: "scripts/enviar-puntuacion.php",
            data: {
                puntuaciones: puntuaciones,
                nombreEquipo: nombreEquipo,
                totalGeneral: totalGeneral,
                totalCategoria1: totalCategoria1,
                totalCategoria2: totalCategoria2,
                totalCategoria3: totalCategoria3,
                totalCategoria4: totalCategoria4,
                totalCategoria5: totalCategoria5
            },
            success: function(response) {
                console.log(response);

                if (!existenRegistros && response === "existenRegistros") {
                    $("#modalExistenRegistros").css("display", "block");
                    existenRegistros = true;
                } else if (!puntuacionGuardada && response === "puntuacionGuardada") {
                    $("#modalEnviadas").css("display", "block");
                    puntuacionGuardada = true;
                } else if (!noRegistrado && response === "noRegistrado") {
                    $("#modalNoRegistrado").css("display", "block");
                    noRegistrado = true;
                } else if (response === "puntuacionesDefinitivas") {
                    $("#modalPuntuacionDefinitiva").css("display", "block");
                }
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

});
    $(".close-modal").click(function(){
    $(".modal").css("display", "none");
});
});

/* BOTÓN PARA COMPROBAR PUNTUACIONES POR EQUIPO*/

$(document).ready(function() {
$('#btnComprobar').click(function(e) {
    e.preventDefault();

    var nombreEquipo = $('#nombre_equipo').val();

    $.ajax({
        type: "POST",
        url: "scripts/comprobar-puntuacion.php",
        data: {
            nombreEquipo: nombreEquipo
        },
        success: function(response) {
            if (response === "noExiste") {
                $("#modalNoRegistrado").css("display", "block");
            } else if (response === "sinPuntuar") {
                 $("#modalSinPuntuar").css("display", "block");
            } else if (response === "nombreObligatorio") {
                $("#modalNombreObligatorio").css("display", "block");
            } else if (response === "error") {
                alert("Se produjo un error en la comprobación");
            } else if (response === "puntuacionesTemporales") {
                $("#modalPuntuacionesTemporales").css("display", "block");
            } else if (response === "puntuacionDefinitiva") {
                $("#modalPuntuacionDefinitiva").css("display", "block");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al procesar la solicitud.");
        }
    });
});
    $(".close-modal").click(function(){
    $(".modal").css("display", "none");
});
});

$(document).ready(function() {
    $('#btnRegistrar').click(function(e) {
    e.preventDefault();

    var nombreEquipo = $('#nombre_equipo').val();

    $.ajax({
        type: "POST",
        url: "scripts/registrar-equipo.php",
        data: {
            nombreEquipo: nombreEquipo
        },
        success: function(response) {
            console.log(response); 
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al procesar la solicitud.");
        }
    });
});
    $(".close-modal").click(function(){
    $(".modal").css("display", "none");
});
});

</script>

<script>
$(document).ready(function() {
    $('#btnConsultar').click(function(e) {
        e.preventDefault();
        var nombreEquipo = $('#nombre_equipo').val();
        $.ajax({
            type: "GET",
            url: "scripts/obtener-puntuaciones-guardadas.php",
            data: { nombreEquipo: nombreEquipo },
            success: function(response) {
                var puntuaciones = response.split(';'); 
                
                puntuaciones.forEach(function(puntuacion) {
                    var partes = puntuacion.split(':');
                    var clave = partes[0];
                    var valor = partes[1];
                    $('input').filter(function() {
                        return this.id === clave;
                    }).val(function() {
                        return valor === '0' ? '' : valor;
                    });
                });
                calcularTotales();

            }
        });
    });
});

function calcularTotales() {
    const itemPuntuacionInputs = document.querySelectorAll('.item-puntuacion');
    const allPuntuacionInputs = document.querySelectorAll('.item-puntuacion');

    let totalPuntuacion = 0;

    allPuntuacionInputs.forEach(itemInput => {
        const valor = parseFloat(itemInput.value) || 0;
        totalPuntuacion += valor;
    });

    const puntuacionTotalInputs = document.querySelectorAll('.puntuacion-automatica.general');
    puntuacionTotalInputs.forEach(puntuacionTotalInput => {
        puntuacionTotalInput.value = totalPuntuacion || '';
    });

    const categorias = new Set();
    itemPuntuacionInputs.forEach(input => categorias.add(input.getAttribute('data-categoria')));

    categorias.forEach(categoria => {
        const categoriaInputs = document.querySelectorAll(`.item-puntuacion[data-categoria="${categoria}"]`);
        let totalPuntuacionCategoria = null;

        categoriaInputs.forEach(itemInput => {
            const valor = parseFloat(itemInput.value) || 0;
            totalPuntuacionCategoria = (totalPuntuacionCategoria === null) ? valor : totalPuntuacionCategoria + valor;
        });

        const puntuacionTotalInputsCategoria = document.querySelectorAll(`.puntuacion-automatica[data-categoria="${categoria}"]`);
        puntuacionTotalInputsCategoria.forEach(puntuacionTotalInput => {
            puntuacionTotalInput.value = (totalPuntuacionCategoria !== null && totalPuntuacionCategoria !== 0) ? totalPuntuacionCategoria : '';
        });
    });
}
</script>