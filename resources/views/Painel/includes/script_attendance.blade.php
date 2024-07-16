<script>

    /* VARIÁVEL DA TABELA */
    var table = $("#tableExport");

    /* EVENTO DE CLICK DO BTN DELETAR DA LINHA DA TABELA */
    table.on('click', '.remove', function (e) {

        /* MENSAGEM DE CONFIRMAÇÃO PARA DELEDAR */
        Swal.fire({
            title             : 'Deseja deletar  {{$name['single']}}?',
            text              : "Após confirmar o registro será excluído!",
            icon              : 'warning',
            showCancelButton  : true,
            confirmButtonColor: '#d33',
            cancelButtonColor : '#3085d6',
            confirmButtonText : 'Sim, delete isso!',
            cancelButtonText  : 'Cancelar!'
        }).then((result) => {

            /* ATRIBUTO DO OBJETO QUE CONTEM O ID DO REGISTRO CLICADO */
            var object = $(this)[0]['attributes'][0];

            /* VALOR DO ID DO REGISTRO A SER DELETADO */
            var id_registro = $(object).val();

            /* SE A MENSAGEM FOR CONFIRMADA */
            if (result.value) {
                /* ENVIA O FORMULÁRIO COM O ID DO REGISTRO PARA DELETAR */
                $.ajax({
                    type   : 'post',
                    url    : "{{route("attendee.destroyWithAjaxFake")}}",
                    data   : {
                        "_token": "{{ csrf_token()}}",
                        id      : id_registro
                    },
                    success: function (data) {

                        /* SE DELETOU */
                        if (data) {

                            Swal.fire(
                                'Deletado!',
                                '{{$name['single']}} deletado com sucesso!',
                                'success'
                            ).then((ok) => {

                                if (ok)
                                    window.location.reload();
                            })

                            /* SE NÃO DELETOU */
                        } else {
                            Swal.fire(
                                'Erro 501!',
                                'Não foi possível deletar  {{$name['single']}}!',
                                'info'
                            )
                        }

                    },
                    error  : function (e) {

                        /* SE DEU ALGUM ERROR */
                        switch (e.status) {
                            case 403:
                                Swal.fire(
                                    'Erro 403!',
                                    'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                    'error'
                                );
                                break;

                            case 404:
                                Swal.fire(
                                    'Erro 404!',
                                    '{{($name['single'])}} não encontrado',
                                    'error'
                                );
                                break;

                            case 500:
                                Swal.fire(
                                    'Erro 500!',
                                    'Algo deu errado, entre em contato com o administrador do sistema.',
                                    'error'
                                );
                                break;

                            case 503:
                                Swal.fire(
                                    'Erro 503!',
                                    'Algo deu errado, tente novamente mais tarde.',
                                    'error'
                                );
                                break;
                        }

                    }
                });
            }
        })
    });

    /* EVENTO DE CLICK DO BTN DELETAR DA LINHA DA TABELA */
    table.on('click', '.remove_force', function (e) {

        /* MENSAGEM DE CONFIRMAÇÃO PARA DELEDAR */
        Swal.fire({
            title             : 'Deseja deletar  {{$name['single']}} permanentemente?',
            text              : "Após confirmar não terá como restituir!",
            icon              : 'warning',
            showCancelButton  : true,
            confirmButtonColor: '#d33',
            cancelButtonColor : '#3085d6',
            confirmButtonText : 'Sim, delete isso!',
            cancelButtonText  : 'Cancelar!'
        }).then((result) => {

            /* ATRIBUTO DO OBJETO QUE CONTEM O ID DO REGISTRO CLICADO */
            var object = $(this)[0]['attributes'][0];

            /* VALOR DO ID DO REGISTRO A SER DELETADO */
            var id_registro = $(object).val();

            /* SE A MENSAGEM FOR CONFIRMADA */
            if (result.value) {
                /* ENVIA O FORMULÁRIO COM O ID DO REGISTRO PARA DELETAR */
                $.ajax({
                    type   : 'post',
                    url    : "{{route("attendee.destroyWithAjax")}}",
                    data   : {
                        "_token": "{{ csrf_token()}}",
                        id      : id_registro
                    },
                    success: function (data) {

                        /* SE DELETOU */
                        if (data) {

                            Swal.fire(
                                'Deletado!',
                                '{{$name['single']}} deletado com sucesso.',
                                'success'
                            ).then((ok) => {
                                if (ok)
                                    window.location.reload();
                            })

                            /* SE NÃO DELETOU */
                        } else {
                            Swal.fire(
                                'Erro 501!',
                                'Não foi possível deletar  {{$name['single']}}!',
                                'info'
                            )
                        }

                    },
                    error  : function (e) {

                        /* SE DEU ALGUM ERROR */
                        switch (e.status) {
                            case 403:
                                Swal.fire(
                                    'Erro 403!',
                                    'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                    'error'
                                );
                                break;

                            case 404:
                                Swal.fire(
                                    'Erro 404!',
                                    '{{($name['single'])}} não encontrado',
                                    'error'
                                );
                                break;

                            case 500:
                                Swal.fire(
                                    'Erro 500!',
                                    'Algo deu errado, entre em contato com o administrador do sistema.',
                                    'error'
                                );
                                break;

                            case 503:
                                Swal.fire(
                                    'Erro 503!',
                                    'Algo deu errado, tente novamente mais tarde.',
                                    'error'
                                );
                                break;
                        }

                    }
                });
            }
        })
    });

    /* EVENTO DE CLICK DO BTN DELETAR DA LINHA DA TABELA */
    table.on('click', '.restore', function (e) {

        /* MENSAGEM DE CONFIRMAÇÃO PARA DELEDAR */
        Swal.fire({
            title             : 'Deseja restaurar {{$name['single']}}?',
            text              : "Após confirmar o registro retornará a tabela padrão!",
            icon              : 'warning',
            showCancelButton  : true,
            confirmButtonColor: '#d33',
            cancelButtonColor : '#3085d6',
            confirmButtonText : 'Sim, restaurar isso!',
            cancelButtonText  : 'Cancelar!'
        }).then((result) => {

            /* ATRIBUTO DO OBJETO QUE CONTEM O ID DO REGISTRO CLICADO */
            var object = $(this)[0]['attributes'][0];

            /* VALOR DO ID DO REGISTRO A SER DELETADO */
            var id_registro = $(object).val();

            /* SE A MENSAGEM FOR CONFIRMADA */
            if (result.value) {
                /* ENVIA O FORMULÁRIO COM O ID DO REGISTRO PARA DELETAR */
                $.ajax({
                    type   : 'post',
                    url    : "{{route("$route.restoreWithAjax")}}",
                    data   : {
                        "_token": "{{ csrf_token()}}",
                        id      : id_registro
                    },
                    success: function (data) {

                        /* SE RESTAUROU */
                        if (data) {

                            Swal.fire(
                                'Restaurado!',
                                '{{$name['single']}} restaurado com sucesso.',
                                'success'
                            ).then((ok) => {
                                if (ok)
                                    window.location.reload();
                            })

                            /* SE NÃO RESTAUROU */
                        } else {
                            Swal.fire(
                                'Erro 501!',
                                'Não foi possível restaurar  {{$name['single']}}!',
                                'info'
                            )
                        }

                    },
                    error  : function (e) {

                        /* SE DEU ALGUM ERROR */
                        switch (e.status) {
                            case 403:
                                Swal.fire(
                                    'Erro 403!',
                                    'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                    'error'
                                );
                                break;

                            case 404:
                                Swal.fire(
                                    'Erro 404!',
                                    '{{($name['single'])}} não encontrado',
                                    'error'
                                );
                                break;

                            case 500:
                                Swal.fire(
                                    'Erro 500!',
                                    'Algo deu errado, entre em contato com o administrador do sistema.',
                                    'error'
                                );
                                break;

                            case 503:
                                Swal.fire(
                                    'Erro 503!',
                                    'Algo deu errado, tente novamente mais tarde.',
                                    'error'
                                );
                                break;
                        }

                    }
                });
            }
        })
    });

    /* VARIÁVEL DO BTN DELETAR SELECIONADOS*/
    var buttomFormDestroyMult = $("#destroyMult");

    /* EVENTO DE CLICK DO BTN DELETAR SELECIONADOS */
    buttomFormDestroyMult.click(function () {

        // DESABILITA O SUBMIT NATURAL DO FORM
        $('#formDestroyMult').submit(function () {
            return false;
        });

        /* VARIÁVEL DA PARA VERIFICAR SE EXISTE INPUTS MARCADOS */
        var checked = false;

        /* QUANTIDADE DE INPUTS DA TABELA */
        var qtdElementsCheckbox = $('#formDestroyMult')[0]['elements'].length;

        /* PERCORRE OS INPUTS DA PAGINA ATUAL DA TABELA */
        for (let i = 0; i < qtdElementsCheckbox; i++) {

            /* ELEMENTO DA TABELA DINÂMICO */
            var form = $('#formDestroyMult')[0]['elements'][i];

            /* VERIFICA SE O INPUT ESTÁ MARCADO */
            if ($(form)[0].checked) {
                /* ATIVA A VARIÁVEL CHECKED */
                checked = true;
                /* INTERROMPE O LOOP */
                break;
            }
        }

        /* VERIFICA SE A VARIÁVEL CHECKED É TRUE */
        if (checked) {

            /* MENSAGEM DE CONFIRMAÇÃO PARA DELETAR OS SELECIONADOS */
            Swal.fire({
                title             : 'Deseja deletar {{$name['plus']}} selecionados?',
                text              : "Após confirmar o registro será excluído!",
                icon              : 'warning',
                showCancelButton  : true,
                confirmButtonColor: '#d33',
                cancelButtonColor : '#3085d6',
                confirmButtonText : 'Sim, delete isso!',
                cancelButtonText  : 'Cancelar!'
            }).then((result) => {

                /* SERIALIZA O FORM PARA PASSAR PARA O CONTROLE */
                var data = $('#formDestroyMult').serialize();

                /* SE A MENSAGEM FOR CONFIRMADA */
                if (result.value) {
                    /* ENVIA O FORMULÁRIO COM OS REGISTROS PARA SEREM DELETADOS */
                    $.ajax({
                        type   : 'post',
                        url    : "{{route("attendee.destroyMultWithAjaxFake")}}",
                        data   : data,
                        success: function (data) {

                            /* SE DELETOU */
                            if (data) {
                                /* MENSAGEM DE SUCESSO */
                                Swal.fire(
                                    'Deletado!',
                                    '{{($name['plus'])}} deletados com sucesso.',
                                    'success'
                                ).then((ok) => {
                                    if (ok)
                                        window.location.reload();
                                })

                                /* SE NÃO DELETOU */
                            } else {
                                /* MENSAGEM DE ERRO */
                                Swal.fire(
                                    'Erro 501!',
                                    'Não foi possível deletar {{$name['plus']}} selecionados!',
                                    'info'
                                )
                            }
                        },
                        error  : function (e) {

                            /* SE DEU ALGUM ERROR */
                            switch (e.status) {
                                case 403:
                                    Swal.fire(
                                        'Erro 403!',
                                        'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                        'error'
                                    );
                                    break;

                                case 404:
                                    Swal.fire(
                                        'Erro 404!',
                                        '{{($name['single'])}} não encontrado',
                                        'error'
                                    );
                                    break;

                                case 500:
                                    Swal.fire(
                                        'Erro 500!',
                                        'Algo deu errado, entre em contato com o administrador do sistema.',
                                        'error'
                                    );
                                    break;

                                case 503:
                                    Swal.fire(
                                        'Erro 503!',
                                        'Algo deu errado, tente novamente mais tarde.',
                                        'error'
                                    );
                                    break;
                            }

                        }
                    });
                }
            })

            /* SE NÃO FOR MARCADO NENHUM INPUT */
        } else {
            /* MENSAGEM PARA MARCAR PELO MENOS UM INPUT */
            Swal.fire(
                'Ops!',
                'Escolha pelo menos um {{$name['single']}} para deletar!',
                'info'
            )
        }
    });

    /* VARIÁVEL DO BTN DELETAR SELECIONADOS*/
    var buttomFormDestroyMultForce = $("#destroyMultForce");

    /* EVENTO DE CLICK DO BTN DELETAR SELECIONADOS */
    buttomFormDestroyMultForce.click(function () {

        // DESABILITA O SUBMIT NATURAL DO FORM
        $('#formDestroyMult').submit(function () {
            return false;
        });

        /* VARIÁVEL DA PARA VERIFICAR SE EXISTE INPUTS MARCADOS */
        var checked = false;

        /* QUANTIDADE DE INPUTS DA TABELA */
        var qtdElementsCheckbox = $('#formDestroyMult')[0]['elements'].length;

        /* PERCORRE OS INPUTS DA PAGINA ATUAL DA TABELA */
        for (let i = 0; i < qtdElementsCheckbox; i++) {

            /* ELEMENTO DA TABELA DINÂMICO */
            var form = $('#formDestroyMult')[0]['elements'][i];

            /* VERIFICA SE O INPUT ESTÁ MARCADO */
            if ($(form)[0].checked) {
                /* ATIVA A VARIÁVEL CHECKED */
                checked = true;
                /* INTERROMPE O LOOP */
                break;
            }
        }

        /* VERIFICA SE A VARIÁVEL CHECKED É TRUE */
        if (checked) {

            /* MENSAGEM DE CONFIRMAÇÃO PARA DELETAR OS SELECIONADOS */
            Swal.fire({
                title             : 'Deseja deletar {{$name['plus']}} selecionados permanentemente?',
                text              : "Após confirmar não terá como restituir!",
                icon              : 'warning',
                showCancelButton  : true,
                confirmButtonColor: '#d33',
                cancelButtonColor : '#3085d6',
                confirmButtonText : 'Sim, delete isso!',
                cancelButtonText  : 'Cancelar!'
            }).then((result) => {

                /* SERIALIZA O FORM PARA PASSAR PARA O CONTROLE */
                var data = $('#formDestroyMult').serialize();

                /* SE A MENSAGEM FOR CONFIRMADA */
                if (result.value) {
                    /* ENVIA O FORMULÁRIO COM OS REGISTROS PARA SEREM DELETADOS */
                    $.ajax({
                        type   : 'post',
                        url    : "{{route("attendee.destroyMultWithAjax")}}",
                        data   : data,
                        success: function (data) {

                            /* SE DELETOU */
                            if (data) {
                                /* MENSAGEM DE SUCESSO */
                                Swal.fire(
                                    'Deletado!',
                                    '{{($name['plus'])}} deletados com sucesso.',
                                    'success'
                                ).then((ok) => {
                                    if (ok)
                                        window.location.reload();
                                })

                                /* SE NÃO DELETOU */
                            } else {
                                /* MENSAGEM DE ERRO */
                                Swal.fire(
                                    'Erro 501!',
                                    'Não foi possível deletar {{$name['plus']}} selecionados!',
                                    'info'
                                )
                            }
                        },
                        error  : function (e) {

                            /* SE DEU ALGUM ERROR */
                            switch (e.status) {
                                case 403:
                                    Swal.fire(
                                        'Erro 403!',
                                        'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                        'error'
                                    );
                                    break;

                                case 404:
                                    Swal.fire(
                                        'Erro 404!',
                                        '{{($name['single'])}} não encontrado',
                                        'error'
                                    );
                                    break;

                                case 500:
                                    Swal.fire(
                                        'Erro 500!',
                                        'Algo deu errado, entre em contato com o administrador do sistema.',
                                        'error'
                                    );
                                    break;

                                case 503:
                                    Swal.fire(
                                        'Erro 503!',
                                        'Algo deu errado, tente novamente mais tarde.',
                                        'error'
                                    );
                                    break;
                            }

                        }
                    });
                }
            })

            /* SE NÃO FOR MARCADO NENHUM INPUT */
        } else {
            /* MENSAGEM PARA MARCAR PELO MENOS UM INPUT */
            Swal.fire(
                'Ops!',
                'Escolha pelo menos um {{$name['single']}} para deletar!',
                'info'
            )
        }
    });

    /* VARIÁVEL DO BTN DELETAR SELECIONADOS*/
    var buttomFormRestoreMult = $("#restoreMult");

    /* EVENTO DE CLICK DO BTN DELETAR SELECIONADOS */
    buttomFormRestoreMult.click(function () {

        // DESABILITA O SUBMIT NATURAL DO FORM
        $('#formDestroyMult').submit(function () {
            return false;
        });

        /* VARIÁVEL DA PARA VERIFICAR SE EXISTE INPUTS MARCADOS */
        var checked = false;

        /* QUANTIDADE DE INPUTS DA TABELA */
        var qtdElementsCheckbox = $('#formDestroyMult')[0]['elements'].length;

        /* PERCORRE OS INPUTS DA PAGINA ATUAL DA TABELA */
        for (let i = 0; i < qtdElementsCheckbox; i++) {

            /* ELEMENTO DA TABELA DINÂMICO */
            var form = $('#formDestroyMult')[0]['elements'][i];

            /* VERIFICA SE O INPUT ESTÁ MARCADO */
            if ($(form)[0].checked) {
                /* ATIVA A VARIÁVEL CHECKED */
                checked = true;
                /* INTERROMPE O LOOP */
                break;
            }
        }

        /* VERIFICA SE A VARIÁVEL CHECKED É TRUE */
        if (checked) {

            /* MENSAGEM DE CONFIRMAÇÃO PARA DELETAR OS SELECIONADOS */
            Swal.fire({
                title             : 'Deseja restaurar {{$name['plus']}} selecionados?',
                text              : "Após confirmar, os registros retornarão a tabela padrão!",
                icon              : 'warning',
                showCancelButton  : true,
                confirmButtonColor: '#d33',
                cancelButtonColor : '#3085d6',
                confirmButtonText : 'Sim, restaure isso!',
                cancelButtonText  : 'Cancelar!'
            }).then((result) => {

                /* SERIALIZA O FORM PARA PASSAR PARA O CONTROLE */
                var data = $('#formDestroyMult').serialize();

                /* SE A MENSAGEM FOR CONFIRMADA */
                if (result.value) {
                    /* ENVIA O FORMULÁRIO COM OS REGISTROS PARA SEREM DELETADOS */
                    $.ajax({
                        type   : 'post',
                        url    : "{{route("$route.restoreMultWithAjax")}}",
                        data   : data,
                        success: function (data) {

                            /* SE DELETOU */
                            if (data) {
                                /* MENSAGEM DE SUCESSO */
                                Swal.fire(
                                    'Restaurado!',
                                    '{{($name['plus'])}} restaurado com sucesso.',
                                    'success'
                                ).then((ok) => {
                                    if (ok)
                                        window.location.reload();
                                })

                                /* SE NÃO DELETOU */
                            } else {
                                /* MENSAGEM DE ERRO */
                                Swal.fire(
                                    'Erro 501!',
                                    'Não foi possível resaturar {{$name['plus']}} selecionados!',
                                    'info'
                                )
                            }
                        },
                        error  : function (e) {

                            /* SE DEU ALGUM ERROR */
                            switch (e.status) {
                                case 403:
                                    Swal.fire(
                                        'Erro 403!',
                                        'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                        'error'
                                    );
                                    break;

                                case 404:
                                    Swal.fire(
                                        'Erro 404!',
                                        '{{($name['single'])}} não encontrado',
                                        'error'
                                    );
                                    break;

                                case 500:
                                    Swal.fire(
                                        'Erro 500!',
                                        'Algo deu errado, entre em contato com o administrador do sistema.',
                                        'error'
                                    );
                                    break;

                                case 503:
                                    Swal.fire(
                                        'Erro 503!',
                                        'Algo deu errado, tente novamente mais tarde.',
                                        'error'
                                    );
                                    break;
                            }

                        }
                    });
                }
            })

            /* SE NÃO FOR MARCADO NENHUM INPUT */
        } else {
            /* MENSAGEM PARA MARCAR PELO MENOS UM INPUT */
            Swal.fire(
                'Ops!',
                'Escolha pelo menos um {{$name['single']}} para restaurar!',
                'info'
            )
        }
    });

    /* VARIÁVEL DO BTN DELETAR SELECIONADOS*/
    var buttomClearTable = $("#clearTable");

    /* EVENTO DE CLICK DO BTN DELETAR SELECIONADOS */
    buttomClearTable.click(function () {

        /* MENSAGEM DE CONFIRMAÇÃO PARA DELETAR OS SELECIONADOS */
        Swal.fire({
            title             : 'Deseja deletar todos os registros da tabela {{$name['plus']}}?',
            text              : "Após confirmar todos os registros serão excluídos",
            icon              : 'warning',
            showCancelButton  : true,
            confirmButtonColor: '#d33',
            cancelButtonColor : '#3085d6',
            confirmButtonText : 'Sim, delete isso!',
            cancelButtonText  : 'Cancelar!'
        }).then((result) => {

            /* SE A MENSAGEM FOR CONFIRMADA */
            if (result.value) {
                /* ENVIA O FORMULÁRIO COM OS REGISTROS PARA SEREM DELETADOS */
                $.ajax({
                    type   : 'post',
                    url    : "{{route("attendance.clearTable")}}",
                    data   :  {"_token": "{{ csrf_token()}}"},
                    success: function (data) {

                        /* SE DELETOU */
                        if (data) {
                            /* MENSAGEM DE SUCESSO */
                            Swal.fire(
                                'Limpa!',
                                'Tabela {{$name['plus']}} limpa com sucesso.',
                                'success'
                            ).then((ok) => {
                                if (ok)
                                    window.location.reload();
                            })

                            /* SE NÃO DELETOU */
                        } else {
                            /* MENSAGEM DE ERRO */
                            Swal.fire(
                                'Erro 501!',
                                'Não foi possível limpar a tabela {{$name['plus']}}!',
                                'info'
                            )
                        }
                    },
                    error  : function (e) {

                        /* SE DEU ALGUM ERROR */
                        switch (e.status) {
                            case 403:
                                Swal.fire(
                                    'Erro 403!',
                                    'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                    'error'
                                );
                                break;

                            case 404:
                                Swal.fire(
                                    'Erro 404!',
                                    '{{($name['single'])}} não encontrado',
                                    'error'
                                );
                                break;

                            case 500:
                                Swal.fire(
                                    'Erro 500!',
                                    'Algo deu errado, entre em contato com o administrador do sistema.',
                                    'error'
                                );
                                break;

                            case 503:
                                Swal.fire(
                                    'Erro 503!',
                                    'Algo deu errado, tente novamente mais tarde.',
                                    'error'
                                );
                                break;
                        }

                    }
                });
            }
        })

    });

    /* VARIÁVEL DO BTN DELETAR SELECIONADOS*/
    var buttomClearTableForce = $("#clearTableForce");

    /* EVENTO DE CLICK DO BTN DELETAR SELECIONADOS */
    buttomClearTableForce.click(function () {


        /* MENSAGEM DE CONFIRMAÇÃO PARA DELETAR OS SELECIONADOS */
        Swal.fire({
            title             : 'Deseja deletar todos os registros permanentemente da tabela {{$name['plus']}}?',
            text              : "Após confirmar todos os registros que estão nessa lixeira serão destruídos, não terá como" +
                " restituir!",
            icon              : 'warning',
            showCancelButton  : true,
            confirmButtonColor: '#d33',
            cancelButtonColor : '#3085d6',
            confirmButtonText : 'Sim, delete isso!',
            cancelButtonText  : 'Cancelar!'
        }).then((result) => {

            /* SE A MENSAGEM FOR CONFIRMADA */
            if (result.value) {
                /* ENVIA O FORMULÁRIO COM OS REGISTROS PARA SEREM DELETADOS */
                $.ajax({
                    type   : 'post',
                    url    : "{{route("attendance.clearTableForce")}}",
                    data   :  {"_token": "{{ csrf_token()}}"},
                    success: function (data) {

                        /* SE DELETOU */
                        if (data) {
                            /* MENSAGEM DE SUCESSO */
                            Swal.fire(
                                'Limpa!',
                                'Tabela {{$name['plus']}} limpa com sucesso.',
                                'success'
                            ).then((ok) => {
                                if (ok)
                                    window.location.reload();

                            })

                            /* SE NÃO DELETOU */
                        } else {
                            /* MENSAGEM DE ERRO */
                            Swal.fire(
                                'Erro 501!',
                                'Não foi possível limpar a tabela {{$name['plus']}}!',
                                'info'
                            )
                        }
                    },
                    error  : function (e) {

                        /* SE DEU ALGUM ERROR */
                        switch (e.status) {
                            case 403:
                                Swal.fire(
                                    'Erro 403!',
                                    'Seu usuário não tem permissão para deletar {{($name['single'])}}!',
                                    'error'
                                );
                                break;

                            case 404:
                                Swal.fire(
                                    'Erro 404!',
                                    '{{($name['single'])}} não encontrado',
                                    'error'
                                );
                                break;

                            case 500:
                                Swal.fire(
                                    'Erro 500!',
                                    'Algo deu errado, entre em contato com o administrador do sistema.',
                                    'error'
                                );
                                break;

                            case 503:
                                Swal.fire(
                                    'Erro 503!',
                                    'Algo deu errado, tente novamente mais tarde.',
                                    'error'
                                );
                                break;
                        }

                    }
                });
            }
        })

    });


</script>
