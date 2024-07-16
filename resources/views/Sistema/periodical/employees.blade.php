<script>

    {{-- FUNÇÃO PARA PEGAR OS FUNCIONÁRIOS DE UMA EMPRESA SELECIONADA --}}
    $('select[name=company_id]').change(function(){

        var id_company = $(this).val();

        $.ajax({
            type: 'get',
            url: "{{route('periodical.employeesAjax')}}",
            data: {id: id_company},
            success: function (data) {

                var html = '';

                for (var i = 0; i < data.employees.length; i++){
                    html += "<option value='"+data.employees[i].id+"'>"+data.employees[i].name+"</option>";
                }

                $("select[name=employee_id]")
                    .html("<option value=''>Selecione o funcionário...</option>" + html);

            },
            error: function (data) {

                Swal(
                        'Erro 500!',
                        'Não foi possivel carregar as empresas!',
                        'error'
                    )

            },
        });
    });


    {{-- FUNÇÃO PARA PEGAR OS DADOS DO FUNCIONÁRIOS SELECIONADO --}}
    $('select[name=employee_id]').change(function(){

        var id_employee = $(this).val();

        $.ajax({
            type: 'get',
            url: "{{route('periodical.dataEmployeesAjax')}}",
            data: {id: id_employee},
            success: function (data) {

                var html = '';

                $('input[name=occupation]').val(data.employee.occupation);
                $('input[name=sex]').val(data.employee.sex);
                $('input[name=rg]').val(data.employee.rg);
                $('input[name=cpf]').val(data.employee.cpf);
                $('input[name=birth]').val(data.employee.birth);
                $('input[name=age]').val(data.employee.age);

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
