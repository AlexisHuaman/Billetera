$(document).ready(function () {
  // Variable para almacenar el tipo de transacción seleccionado
  let tipoTransaccion = $("#t_tipo").val(); // Valor inicial al cargar la página

  // Escuchar cambios en el select de tipo de transacción
  $("#t_tipo").on("change", function () {
    tipoTransaccion = $(this).val(); // Actualizar la variable cuando se selecciona un nuevo valor
    listarCategorias(); // Actualizar las categorías cada vez que se cambie el tipo
  });

  // Función para listar las categorías basadas en el tipo de transacción
  function listarCategorias() {
    let funcion = "categoria_transaccion";
    console.log(tipoTransaccion);
    $.post(
      "../controlador/TransaccionesController.php",
      { funcion, tipo: tipoTransaccion }, // Enviar el tipo de transacción junto con la función
      (response) => {
        console.log(response);
        let data = JSON.parse(response);
        console.log(data);

        // Limpiar el contenedor
        $("#categoriasContainer").empty();

        // Crear botones para cada categoría
        data.forEach((categoria) => {
          let button = $("<button></button>")
            .addClass(
              "bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg m-2 w-40 h-40 flex flex-col items-center justify-center"
            )
            .attr("data-id", categoria.id);

          // Añadir la imagen (dependiendo de la categoría)
          let imgSrc = `../imagenes/categorias/categoria${categoria.id}.png`;
          let img = $("<img>")
            .attr("src", imgSrc)
            .addClass("w-24 h-24 mb-2 object-contain");

          // Añadir el texto de la categoría
          let text = $("<span></span>")
            .text(categoria.nombre)
            .addClass("text-center");

          // Añadir la imagen y el texto al botón
          button.append(img);
          button.append(text);

          // Evento click para redirigir a la categoría seleccionada
          button.on("click", function () {
            let categoriaId = $(this).attr("data-id");
            window.location.href = `../vista/categoria.php?id=${categoriaId}`;
          });

          // Añadir el botón al contenedor
          $("#categoriasContainer").append(button);
        });
      }
    );
  }

  // Llamar la función por primera vez para listar las categorías inicialmente
  listarCategorias();
});