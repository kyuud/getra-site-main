<script>
    {{-- FUNÇÃO PARA PEGAR UMA EMPRESA SELECIONADA APARTIR DO CNPJ--}}
    $('input[name=cnpj]').blur(function(){
        var cnpj = $(this).val();
        var sanitizedCnpj = cnpj.replace(/[^0-9]/g, ''); // Remove non-numeric characters

        $.ajax({
            type: 'get',
            url: '{{route('attendance.companiesAjax')}}',
            data: {cnpj: sanitizedCnpj},
            success: function (data) {
                console.log(data);
                $('input[name=company]').val(data.companies[0].name);
            },
            error: function (data) {
                Swal(
                    'Erro 500!',
                    'Não foi possível carregar os funcionários!',
                    'error'
                );
            },
        });
    });

</script>
