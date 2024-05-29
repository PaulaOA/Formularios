     
    function verificarEquipo(nombreEquipo) {
        $.ajax({
        type: "POST",
        url: "scripts/verificar-equipo.php",
        data: { nombreEquipo: nombreEquipo },
        success: function(response) {
            if (response === "registrado") {
                verificarPuntuacionesDefinitivas(nombreEquipo);
            } else {
                $("#modalNoRegistrado").css("display", "block");
            }
        }
    });
    }

    function verificarPuntuacionesDefinitivas(nombreEquipo) {
        $.ajax({
            type: "POST",
            url: "scripts/verificar-puntuaciones-definitivas.php",
            data: { nombreEquipo: nombreEquipo },
            success: function(response) {
                if (response === "sinRegistros") {
                    continuarProcesoGuardar(nombreEquipo);
                } else {
                    $("#modalPuntuacionDefinitiva").css("display", "block");
                }
            }
        });
    }

      function continuarProcesoGuardar(nombreEquipo) {
        var itemsEspeciales = guardarItemsEspeciales();
        var valorIncorrecto = false;

        $('input[type="text"].centrado').each(function() {
            if ($(this).hasClass('puntuacion-automatica')) {
                return true;
            }

            var puntuacion = $(this).val();

            if (!(puntuacion == 1 || puntuacion == 2 || puntuacion == 3 || puntuacion == 4 || puntuacion == 5 || puntuacion == '')) {
                puntuacionesValidas = false;
                valorIncorrecto = true;
                $("#modalValorIncorrecto").css("display", "block");
                return false;
            }
          });

          if (valorIncorrecto) {
             return; 
             location.reload();
           }

           if (itemsEspeciales) {
            $('input[type="text"].centrado').each(function() {
            if ($(this).hasClass('puntuacion-automatica')) {
                return true;
            }

            var puntuacion = $(this).val();

            if (puntuacion === '' && !guardarPuntuacionesVacias) {
            puntuacionesValidas = false;
            $("#modalGuardarVacias").css("display", "block");
            return false;

            }

        });
         } else if (!itemsEspeciales) {
            puntuacionesValidas = false;
            $("#modalItemsEspeciales").css("display", "block");
            return;
        }

        if(!puntuacionesValidas && !guardarPuntuacionesVacias) {
            return;
        }

        if (puntuacionesValidas || guardarPuntuacionesVacias) {
            enviarPuntuaciones(nombreEquipo);

        }
    }


    function guardarItemsEspeciales() {
    var primerosCuatroLlenos = $('input[data-especial="true"]').slice(0, 4).filter(function() {
        return $(this).val() !== '';
    }).length > 0;

    var ultimosCuatroLlenos = $('input[data-especial="true"]').slice(4).filter(function() {
        return $(this).val() !== '';
    }).length > 0;

    var primerosCuatroVacios = $('input[data-especial="true"]').slice(0, 4).filter(function() {
        return $(this).val() === '';
    }).length === 4;

    var ultimosCuatroVacios = $('input[data-especial="true"]').slice(4).filter(function() {
        return $(this).val() === '';
    }).length === 4;

    return (primerosCuatroLlenos && !ultimosCuatroLlenos) || (!primerosCuatroLlenos && ultimosCuatroLlenos) || (primerosCuatroVacios && ultimosCuatroVacios);
}

        function enviarPuntuaciones(nombreEquipo) {
        if (!puntuacionesValidas && !guardarPuntuacionesVacias) {
            return;
        }

        $('input[type="text"].centrado').each(function() {
            if ($(this).hasClass('puntuacion-automatica')) {
                return true;
            }

            var idItem = $(this).attr('id');
            var puntuacion = $(this).val();

            $.ajax({
                type: "POST",
                url: "scripts/guardar-puntuacion.php",
                data: {
                    idItem: idItem,
                    puntuacion: puntuacion,
                    nombreEquipo: nombreEquipo
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
        $("#modalPuntuacionGuardada").css("display", "block");
        guardarPuntuacionesVacias = false;
        puntuacionesValidas = false;
    }