document.addEventListener("DOMContentLoaded", function() {
    // Selecciona el elemento por su ID
    var emailInput = document.getElementById("Remail");
    var mensajeAviso = document.getElementById("mensajeAviso");

    // Agrega un escuchador de eventos para el cambio ('change')
    emailInput.addEventListener("change", function() {
        // Obtiene el valor del campo de entrada
        let email = this.value;
        
        // Crea un nuevo objeto FormData
        const formData = new FormData();
        // Añade el par clave/valor
        formData.append('email', email);

        // Realiza una petición fetch con el método POST
        fetch('ajax/formularios.ajax.php', {
            method: 'POST',
            body: formData,
            cache: 'no-cache',
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);

            if(data.email== email) {
               // Crea un nuevo div y configura su contenido
               var aviso = document.createElement("div");
               aviso.className = "alert alert-danger"; // Añade clases para el estilo
               aviso.textContent = "MAQUINA ESTE CORREO YA EXISTE"; // Establece el mensaje de texto
               mensajeAviso.innerHTML = ""; // Limpia mensajes anteriores
               mensajeAviso.appendChild(aviso); // Añade el nuevo aviso al contenedor
                emailInput.value = ""; // Opcionalmente, limpiar el campo de correo electrónico
            } else {
                aviso.textContent = ""; // Limpiar el mensaje de aviso si el correo no existe
                console.log("El correo está disponible");
            }

        })
        .catch(error => {
            console.error('Error:', error);
        });
        
        
    });
});
