<script>

    {{----------------------------------------------------
        SCRIPT PARA SALVAR REGISTRO E CONTINUAR CRIANDO!
    ----------------------------------------------------}}

    {{-- VARIÁVEL DO BTN SALVAR E CRIAR NOVO --}}
    let buttomSaveAdd = $("#save_add");

    {{-- EVENTO DE CLICK DO BTN SALVAR E CRIAR NOVO --}}
    buttomSaveAdd.click(function () {

        {{-- SUBISTITUI A ROTA --}}
        $('#formStore').attr("action","{{route("$route.storeAdd")}}");

    });

</script>
