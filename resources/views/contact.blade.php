<x-layouts.app>
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Contact</h1>

    <div>
        <label for="numero_tarjeta">Número de Tarjeta:</label>
        <input type="text" id="numero_tarjeta" name="numero_tarjeta" placeholder="Ingrese el número de tarjeta">
    </div>
</x-layouts.app>
<script>
   /* $(document).ready(function () {
        $('#numero_tarjeta').on('keyup', function () {
            var numeroTarjeta = $(this).val().replace(/\s/g, ''); // Eliminar espacios en blanco
            detectarTipoTarjeta(numeroTarjeta);
        });

        function detectarTipoTarjeta(numeroTarjeta) {
            // Definir los rangos de números de identificación del emisor (IIN o BIN) para tarjetas de crédito y débito
            var regexVisa = /^4/;
            var regexMastercard = /^5[1-5]/;

            // Verificar el tipo de tarjeta
            if (numeroTarjeta.match(regexVisa)) {
                console.log('Tarjeta Visa');
                // Puedes realizar acciones específicas para tarjetas Visa
            } else if (numeroTarjeta.match(regexMastercard)) {
                console.log('Tarjeta MasterCard');
                // Puedes realizar acciones específicas para tarjetas MasterCard
            } else {
                console.log('Tipo de tarjeta no reconocido');
                // Puedes manejar otros casos aquí
            }
        }
    }); */

    const creditRegex = {
    mastercard: /^5[1-5][0-9]{14}$/,
    amex: /^3[47][0-9]{13}$/,
    visa: /^4[0-9]{12}(?:[0-9]{3})?$/
};

const debitRegex = /^(5[1-5][0-9]{14}|2(2(2[1-9]|[3-9][0-9])|[3-6][0-9]{2}|7(0[1-9]|1[0-9]|20))[0-9]{12})$/;

function detectCardType(numeroTarjeta) {
    const cardNumber = numeroTarjeta.replace(/\s/g, '');

    if (debitRegex.test(cardNumber)) {
        return 'Debito';
    } else {
        for (const type in creditRegex) {
            if (creditRegex[type].test(cardNumber)) {
                return 'Credito (' + type.charAt(0).toUpperCase() + type.slice(1) + ')';
            }
        }
    }

    return 'Tipo de tarjeta no reconocido';
}

// Evento keyup en el campo de número de tarjeta
$('#numero_tarjeta').on('keyup', function () {
    const cardNumber = $(this).val();

    // Detecta el tipo de tarjeta
    const cardType = detectCardType(cardNumber);

    // Muestra el tipo de tarjeta en la consola
    console.log('Tipo de tarjeta:', cardType);
});


</script>

