<script>

    {{-- FUNÇÃO PARA PEGAR UMA EMPRESA SELECIONADA --}}
    $('select[name=company_id]').change(function(){

        var id_company = $(this).val();

        $.ajax({
            type: 'get',
            url: "{{route('training.companiesAjax')}}",
            data: {id: id_company},
            success: function (data) {
                $('input[name=cnpj]').val(data.companies[0].cnpj);
            },
            error: function (data) {
                Swal(
                        'Erro 500!',
                        'Não foi possivel carregar os funcionários!',
                        'error'
                    )
            },
        });
    });

</script>
