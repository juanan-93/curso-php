document.addEventListener("DOMContentLoaded", function() {
    // Selecciona el elemento por su ID
    var emailInput = document.getElementById("email");

    // Agrega un escuchador de eventos para el cambio ('change')
    emailInput.addEventListener("change", function() {
        // Obtiene el valor del campo de entrada
        let email = this.value;
        
        // Crea un nuevo objeto FormData
        const formData = new FormData();
        // Añade el par clave/valor
        formData.append('email', email);

        // Realiza una petición fetch con el método POST
        fetch('http://localhost/04.PDO-MYSQL/controladores/validar-email.php', {
            method: 'POST',
            body: formData, // Usa formData como cuerpo de la petición
        })
        .then(response => response.text()) // Convierte la respuesta en texto (o en .json() si esperas JSON)
        .then(data => {
            // Aquí manejas los datos de respuesta
            console.log(data);
        })
        .catch(error => {
            // Manejo de errores
            console.error('Error:', error);
        });
    });
});
