<script>
    $(function(){
    

            // Definir o valor por vida como padrão
         $("#yesCheck").prop("checked", true);

            // Ativar a função calc() após definir os valores iniciais
            calc();
        /**
         * ESCOLHA DO RADIOBOX - VALOR POR VIDA
         */
        $("#yesCheck").click(function (){

            // CRIA O CAMPO
            var html = '<label> Valor por vida </label>' +
                        '<input name="lifevalue" id="lifevalue" class="form-control myvalue" required/>' +
                        '<span><i>Use o ponto ( . ) no lugar da virgula ( , )</i></span>' +
                        '@error("lifevalue")<div class="text-danger">{{ "***$message" }}</div>@enderror';

            // ADD O CAMPO  NO LAYOUT
            $("#anyValue").html(html);

            // ADD O EVENTO NO CAMPO PARA ATIVAR A FUNÇÃO
            $("#lifevalue").keyup(function (){
                calc()
            })

        })


        /**
         * ESCOLHA DO RADIOBOX - VALOR AVULSO
         */
        $("#noCheck").click(function (){

            // CRIA O CAMPO
            var html = '<label> Valor avulso </label>' +
                '<input name="lifevalue" id="lifevalue" class="form-control myvalue" required/>' +
                '<span><i>Use o ponto ( . ) no lugar da virgula ( , )</i></span>' +
                '@error("lifevalue")<div class="text-danger">{{ "***$message" }}</div>@enderror';

            // ADD O CAMPO  NO LAYOUT
            $("#anyValue").html(html);

            // ADD O EVENTO NO CAMPO PARA ATIVAR A FUNÇÃO
            $("#lifevalue").keyup(function (){

                var dis   = ($('#discounts').val() == '' ? 0 : $('#discounts').val());
                let value = parseFloat((this.value)- dis);

                $("#value").val(value.toFixed(2));
            })

        })


        /**
         * FUNÇÃO PARA REALIZAR O CALCULO DOS HONORÁRIOS
         */
         function calc() {
            // Obtém os valores dos elementos de entrada
            var value = parseFloat($('.myvalue').val()) || 0;
            var qtd = parseFloat($('#qtd').val()) || 0;
            var dis = parseFloat($('#discounts').val()) || 0;

            // Realiza o cálculo
            var result = (value * qtd) - dis;

            // Define o valor calculado no campo de entrada com id "value"
            $("#value").val(result.toFixed(2));
        }

        // Adiciona um evento para chamar a função quando a quantidade de funcionários é alterada
        $('#qtd').on('input', calc);


    })
</script>
