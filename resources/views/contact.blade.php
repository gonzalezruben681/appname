<x-layouts.app>
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Contact</h1>

    <div>
        <label for="numero_tarjeta">Número de Tarjeta:</label>
        <input type="text" id="numero_tarjeta" name="numero_tarjeta" placeholder="Ingrese el número de tarjeta">
    </div>
</x-layouts.app>
<script>
    function detectCardType(numeroTarjeta) {
        const cardNumber = numeroTarjeta.replace(/\s/g, '');
        const bin = cardNumber.substring(0, 6);

    console.log(`bin: ${bin}`)
    const apiUrl = `https://data.handyapi.com/bin/${bin}`;

   //Realizar la solicitud a la API
    $.ajax({
        url: apiUrl,
        type: 'GET',
        dataType: 'json',
        async: true,
        success: function (response) {
            // Manejar la respuesta exitosa aquí
            const card = JSON.parse(JSON.stringify(response))
            console.log('Respuesta exitosa:', card);



        },
        error: function (error) {
            // Manejar errores aquí
            console.error('Error en la solicitud:', error);
            return 'desconocido';
        }
    });


        return '';
    }

// Evento keyup en el campo de número de tarjeta
$('#numero_tarjeta').on('keyup', function () {
    const cardNumber = $(this).val();

    // Detecta el tipo de tarjeta
    const cardType = detectCardType(cardNumber);

    // Puedes hacer algo con el tipo de tarjeta, por ejemplo, mostrarlo en la consola
    console.log('Tipo de tarjeta:', cardType);
});

</script>
