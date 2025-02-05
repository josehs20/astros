// const { functions } = require("lodash");

// const { method } = require("lodash");

function montaDatatable(tabelaId, urlAjax, dataAjax) {

    if ($.fn.DataTable.isDataTable('#' + tabelaId)) {
        var table = $('#' + tabelaId).DataTable();
        table.destroy();
        $('#' + tabelaId + ' thead tr:eq(1)').remove();
    }
    if (urlAjax) {
        var table = $('#' + tabelaId).DataTable({
            "ajax": {
                "url": urlAjax,
                "type": "GET", // ou "GET", dependendo do método que você está usando
                "data": dataAjax,
            },
            "language": {
                "searchPlaceholder": "Pesquisa",
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha"
                    }
                }
            },
            "drawCallback": function (settings) {
                $('#' + tabelaId + ' tbody td,' + '#' + tabelaId + ' thead th')
                    .each(function () {
                        $(this).attr('title', $(this).text());
                        $('#' + tabelaId + ' tbody td').addClass('custom-body');
                    });
            },
            "initComplete": function () {
                // Aplica o alinhamento ao thead e tfoot após a inicialização do DataTable
                $('#' + tabelaId + ' thead th, #' + tabelaId + ' tfoot th').css('text-align', 'center');
            }
        });
    } else {

        var table = $('#' + tabelaId).DataTable({
            "order": [[0, 'desc']],
            "language": {
                "searchPlaceholder": "Pesquisa",
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha"
                    }
                }
            },
            "drawCallback": function (settings) {
                $('#' + tabelaId + ' tbody td,' + '#' + tabelaId + ' thead th')
                    .each(function () {
                        $(this).attr('title', $(this).text());
                    });
                $('#' + tabelaId + ' tbody td').addClass('custom-body');
            },
            "initComplete": function () {
                // Aplica o alinhamento ao thead e tfoot após a inicialização do DataTable
                $('#' + tabelaId + ' thead th, #' + tabelaId + ' tfoot th').css('text-align', 'center');
            }
        });
    }
    $('#' + tabelaId + ' thead tr').clone(true).appendTo('#' + tabelaId + ' thead');
    $('#' + tabelaId + ' thead tr:eq(1) th').each(function (i) {

        if (i < table.columns().header().length) {

            var title = $(this).text();
            if (title != 'Ação') {
                $(this).html('<input type="text" placeholder="Filtrar ' + title +
                    '" style="width: 100%;" class="form-control"/>');
            } else {
                $(this).html(' ');
            }

        } else {
            $(this).html(' ');
        }

        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
}

function montaDatatableYajra(tabelaId, columns, urlAjax) {

    var isRequestInProgress = false;
    var typingTimer;  // Temporizador de digitação
    var typingInterval = 1500;  // Intervalo de 2 segundos

    var table = $('#' + tabelaId).DataTable({
        "processing": true,
        "serverSide": true,
        'ordering': false, // Desativa a ordenação automática
        "ajax": {
            "url": urlAjax,
            "type": "GET",
            "data": function (d) {
                $('#' + tabelaId + ' thead tr:eq(1) th').each(function (i) {
                    var input = $(this).find('input');
                    if (input.length) {
                        d['columns'][i]['search']['value'] = input.val();
                    }
                });
            },
            "complete": function () {
                isRequestInProgress = false; // Libera após a requisição ser completada
            }
        },
        'columns': columns,
        "language": {
            "searchPlaceholder": "Pesquisa",
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        },
        "drawCallback": function (settings) {
            $('#' + tabelaId + ' tbody td, ' + '#' + tabelaId + ' thead th')
                .each(function () {
                    $(this).attr('title', $(this).text());
                });
            $('#' + tabelaId + ' tbody td').addClass('custom-body');
        }
    });

    // Clonando o cabeçalho e adicionando os inputs de filtro
    $('#' + tabelaId + ' thead tr').clone(true).appendTo('#' + tabelaId + ' thead');
    $('#' + tabelaId + ' thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        var name = title
            .normalize('NFD') // Normaliza para forma canônica de decomposição
            .replace(/[\u0300-\u036f]/g, '') // Remove acentos
            .replace(/[^\w\s]|_/g, '') // Remove caracteres especiais
            .replace(/\s+/g, '_') // Substitui espaços por _
            .toLowerCase();

        if (name === '') {
            name = 'id';
        }

        if (title !== 'Ação') {
            var input = $('<input>', {
                type: 'text',
                placeholder: 'Filtrar ' + title,
                style: 'width: 100%;',
                class: 'form-control',
                'data-column-name': name
            });
            // Adiciona o evento de keyup com temporizador
            input.on('keyup', function () {
                clearTimeout(typingTimer);  // Limpa o temporizador anterior
                typingTimer = setTimeout(function () {
                    table.ajax.reload();  // Recarrega a tabela após 2 segundos de inatividade
                }, typingInterval);
            });

            // Reinicia o temporizador ao digitar novamente
            input.on('keydown', function () {
                clearTimeout(typingTimer);
            });
            $(this).html(input);
        } else {
            $(this).html(' ');
        }
    });

    // // Adicionando o evento para os inputs de filtro
    // $('#' + tabelaId + ' thead').on('input', 'input', function () {
    //     table.draw();
    // });

}

function select2(idElemento, url, vaiEstarEmAlgumModal = false) {
    if (url) {
        $('#' + idElemento).select2({
            dropdownParent: vaiEstarEmAlgumModal ? $('#' + vaiEstarEmAlgumModal) : vaiEstarEmAlgumModal, // Define o modal como pai do dropdown
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page,
                    };
                },
                processResults: function (data, params) {
                    // Verifica se 'data' é um array ou um objeto
                    const results = Array.isArray(data) ? data : [data]; // Se não for um array, transforma em um array

                    // Retorna os resultados no formato que o Select2 espera
                    return {
                        results: results.map(item => ({
                            id: item.id, // ID do cliente
                            text: item.text // Texto que será exibido no dropdown
                        })),
                        pagination: {
                            more: false // Se não há mais páginas a serem carregadas
                        }
                    };
                },
                cache: true
            },
            placeholder: "Digite para pesquisar",
            allowClear: true,
            language: {
                errorLoading: function () {
                    return "Erro ao carregar as informações.";
                },
                inputTooShort: function () {
                    return "Insira pelo menos 1 caractere...";
                },
                loadingMore: function () {
                    return "Carregando mais resultados...";
                },
                noResults: function () {
                    return "Nenhum resultado encontrado";
                },
                searching: function () {
                    return "Procurando...";
                }
            },
            width: 'resolve'
        });
    } else {

        $('#' + idElemento).select2({
            language: {
                errorLoading: function () {
                    return "Erro ao carregar as informações.";
                },
                inputTooShort: function () {
                    return "Insira pelo menos 1 caracteres...";
                },
                loadingMore: function () {
                    return "Carregando mais";
                },
                noResults: function () {
                    return "Nenhum resultado encontrato";
                },
                searching: function () {
                    return "Carregando...";
                },
            },
        });
    }
}

function isNanOrEmpty(value) {
    // Verifica se é NaN ou vazio
    return value === '' || Number.isNaN(Number(value));
}
function maskDinehiroReturnVal(valor) {
    return parseFloat(valor).toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}
function maskDinheiro(idElemento) {
    $("#" + idElemento).mask('000.000.000.000.000,00', {
        reverse: true // para que o valor seja inserido da direita para a esquerda
    });
}

function maskDinheiroByClass(classElement) {
    $("." + classElement).mask('000.000.000.000.000,00', {
        reverse: true // para que o valor seja inserido da direita para a esquerda
    });
}

function maskPorcentagem(idElemento, limite) {
    $("#" + idElemento).mask('##0,00', {
        translation: {
            '#': {
                pattern: /[0-9]/, // Permite apenas dígitos
                recursive: true
            }
        },
        reverse: true // Permite que os números sejam inseridos no formato correto de percentual
    });

    // Adiciona um evento de input para garantir que o valor máximo seja 100
    $("#" + idElemento).on('input', function () {
        let valor = parseFloat($(this).val().replace(',', '.')); // Converte para número
        if (valor > limite) {
            $(this).val(limite); // Reseta para 100%
            msgToastr('Desconto mais que o permitido, limite de ' + limite + '%', 'warning');
        } else if (isNaN(valor)) {
            $(this).val(''); // Limpa o campo se não for um número válido
        }
    });
}
function maskQtd(idElemento) {
    $("#" + idElemento).mask('#.##0,000', { reverse: true });

    $("#" + idElemento).on('keyup', function () {
        // Remover qualquer caractere que não seja número ou vírgula
        let value = $(this).val().replace(/[^0-9,]/g, '');

        // Verificar se já existe uma vírgula e limitar a três casas decimais
        let parts = value.split(',');
        if (parts[1] && parts[1].length > 3) {
            parts[1] = parts[1].substring(0, 3);
        }

        // Recombinar as partes
        $(this).val(parts.join(','));
    });
}

function maskQtdByClass(classElement) {
    // Aplicar a máscara inicial
    $("." + classElement).mask('#.##0,000', { reverse: true });

    // Evento de 'keyup' para cada input com a classe
    $("." + classElement).on('keyup', function () {
        let value = $(this).val().replace(/[^0-9,]/g, ''); // Remover caracteres inválidos

        // Separar por vírgula (parte inteira e decimal)
        let parts = value.split(',');

        // Limitar a três casas decimais
        if (parts[1] && parts[1].length > 3) {
            parts[1] = parts[1].substring(0, 3);
        }

        // Recombinar as partes (parte inteira e decimal)
        $(this).val(parts.join(','));
    });

    // Garante que valores existentes sejam formatados corretamente ao carregar
    $("." + classElement).each(function () {
        $(this).trigger('keyup'); // Força a formatação no carregamento
    });
}


function buscarCep(idInputCep, idBotaoBuscar, idInputLogradouro, idInputBairro, idInputCidade, idInputUf, idInputComplemento) {
    $('#' + idBotaoBuscar).on('click', function () {
        let cep = $('#' + idInputCep).val();
        let cepSemCaracteresEspeciais = cep.replace(/[.-]/g, '');
        if (!cep || cep == '') {
            toastr.warning('Insira o CEP.');
        }
        $.ajax({
            url: 'https://viacep.com.br/ws/' + cepSemCaracteresEspeciais + '/json/',
            dataType: 'json',
            success: function (data) {
                if (!data.erro) {
                    $('#' + idInputLogradouro).val(data.logradouro);
                    $('#' + idInputBairro).val(data.bairro);
                    $('#' + idInputCidade).val(data.localidade);
                    $('#' + idInputUf).val(data.uf);
                    $('#' + idInputComplemento).val(data.complemento);
                } else {
                    toastr.info('CEP não encontrado!');
                }
            },
            error: function () {
                toastr.warning('Ocorreu um erro ao buscar o CEP. Por favor, tente novamente mais tarde.');
            }
        });
    })
}

function verificarPessoa(documento) {
    if (documento.length === 14) {
        return 'CNPJ';
    } else {
        return 'CPF';
    }
}

function aplicarMascaraDocumento(documento) {
    var tipoPessoa = verificarPessoa(documento);
    if (tipoPessoa === 'CNPJ') {
        // Aplica máscara para CNPJ
        return documento.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');
    } else {
        // Aplica máscara para CPF
        return documento.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
    }
}

function aplicarMascaraCelular(celular) {
    if (celular) {
        return celular.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, '($1) $2 $3-$4');
    }
}

function aplicarMascaraTelefoneFixo(telefoneFixo) {
    if (telefoneFixo) {
        return telefoneFixo.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
    }
}

function aplicarMascaraCep(cep) {
    if (cep) {
        return cep.replace(/^(\d{2})(\d{3})(\d{3})$/, '$1.$2-$3');
    }
}

function aplicarMascaraData(data) {
    if (data) {
        var particionado = data.split('-');

        return particionado[2] + '/' + particionado[1] + '/' + particionado[0];
    }
}

function aplicarMascaraDataHora(data) {
    // Certifique-se de que a data está no formato 'yyyy-mm-dd HH:MM:SS'
    const partesData = data.split(' '); // Separar data e hora

    // Separa a data 'yyyy-mm-dd' em partes
    const [ano, mes, dia] = partesData[0].split('-');

    // Separa a hora 'HH:MM:SS'
    const [hora, minuto, segundo] = partesData[1].split(':');

    // Retorna a data no formato brasileiro 'dd/mm/yyyy HH:mm:ss'
    return `${dia}/${mes}/${ano} às ${hora}:${minuto}:${segundo}`;
}

/* Quando for formulario para editar e ja tiver data registrada, essa função vai formatar a data para o formato brasileiro para exibir no input */
function formatarData() {
    var data = $('#data_nascimento').val();
    var partes = data.split('-');
    var dataFormatada = partes[2] + '/' + partes[1] + '/' + partes[0];
    $('#data_nascimento').val(dataFormatada);
}


/* Quando for formulario para editar, formatara o documento para exibir corretamento no input */
function formatarDocumento(retornar = null) {
    var documento = $('#documento').val();

    if (retornar) {
        documento = retornar;
        if (documento.length === 14) {
            // Aplica máscara para CNPJ: 00.000.000/0000-00
            documentoFormatado = documento.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');
        } else if (documento.length === 11) {
            // Aplica máscara para CPF: 000.000.000-00
            documentoFormatado = documento.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4');
        } else if (!documento || documento == '') {
            documentoFormatado = '';
        } else {
            // Documento inválido (não possui 11 nem 14 dígitos)
            documentoFormatado = 'Documento inválido';
        }
        return documentoFormatado;
    }
    // Verifica se é CNPJ (14 dígitos) ou CPF (11 dígitos)
    if (documento) {
  
        // Define o valor formatado no campo de documento (se necessário)
        $('#documento').val(documentoFormatado);
    }
}
function converteParaFloat(qtd) {
    return parseFloat((qtd.replace(/\./g, '').replace(',', '.')));
}
function trocarPontoPorVirgula(valor) {
    if (typeof valor === 'number') {
        valor = valor.toString();
    }
    return valor.replace(/\./g, ','); // Substitui todos os pontos por vírgulas
}
function abreModalAutenticacao() {
    $('#modalAutenticacaoUsuario').modal('show');
}

function fechaModalAutenticacao() {
    $('#modalAutenticacaoUsuario').modal('hide');
}

function autenticar() {
    $.ajax({
        url: url, // Substitua com o endpoint do servidor
        type: 'POST',
        data: objectData, // Serializa os dados do formulário
        dataType: 'json', // Espera uma resposta JSON
        success: function (response) {
            // Manipula a resposta com sucesso
            $('#response').html('<p>Success: ' + response.message + '</p>');
        },
        error: function (xhr, status, error) {
            // Manipula erros
            $('#response').html('<p>Error: ' + error + '</p>');
        }
    });
}

function disableButtons(botaoComProcessando) {
    $('.btn').attr('disabled', true);
    $('#' + botaoComProcessando).text('Processando...');
}

function habilitaButtons(botaoMudarTexto, texto) {
    $('.btn').attr('disabled', false);
    $('#' + botaoMudarTexto).text(texto);
}

function msgToastr(text, tipo, posicao, custom_toast) {
    if (!posicao) {
        posicao = 'right';
    }

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true, // Ativa a barra de progresso
        "positionClass": "toast-top-" + posicao, // Posição no canto superior direito
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000", // Tempo que a mensagem ficará visível
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };

    switch (tipo) {
        case 'success':
            toastr.success(text)
            break;
        case 'error':
            toastr.error(text)
            break;
        case 'info':
            toastr.info(text)
            break;
        case 'warning':
            toastr.warning(text)
            break;
        default:
            break;
    }
}

function somenteInteiro(elemento) {
    $('#' + elemento).mask('999');
}

function centavosParaFloat(valorEmCentavos) {
    // Verifica se o valor é um número e não é NaN
    if (isNaN(valorEmCentavos)) {
        throw new Error('O valor deve ser um número válido');
    }

    // Divide por 100 e retorna como float
    return valorEmCentavos / 100;
}

function centavosParaReais(valorEmCentavos) {
    // Verifica se o valor é um número e não é NaN
    if (isNaN(valorEmCentavos)) {
        throw new Error('O valor deve ser um número válido');
    }

    // Divide por 100 para converter em reais
    const valorEmReais = valorEmCentavos / 100;

    // Formata o valor em reais com duas casas decimais e vírgula
    return valorEmReais.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function floatParaCentavos(valorEmFloat) {
    // Verifica se o valor é um número e não é NaN
    if (isNaN(valorEmFloat)) {
        throw new Error('O valor deve ser um número válido');
    }

    // Multiplica por 100 e arredonda para evitar problemas de precisão
    return Math.round(valorEmFloat * 100);
}
function validarInput(event) {
    const input = event.target;
    const cursorPosition = input.selectionStart;
    let value = input.value;

    // Remove caracteres inválidos
    let sanitizedValue = value.replace(/[^\d,]/g, '');

    // Limita a quantidade de vírgulas a 1
    const parts = sanitizedValue.split(',');
    if (parts.length > 2) {
        sanitizedValue = parts[0] + ',' + parts.slice(1).join('');
    }

    // Verifica o comprimento máximo de 8 dígitos (sem contar a vírgula)
    const digitsOnly = sanitizedValue.replace(/,/g, '');
    if (digitsOnly.length > 8) {
        sanitizedValue = value.slice(0, cursorPosition - 1) + value.slice(cursorPosition);
    }

    input.value = sanitizedValue;

    // Restaura a posição do cursor
    const newCursorPosition = cursorPosition - (value.length - sanitizedValue.length);
    input.setSelectionRange(newCursorPosition, newCursorPosition);
}

function confirmarAlteracoesComSenha() {
    return new Promise((resolve, reject) => {
        Swal.fire({
            title: `Informe a senha para continuar`,
            html: `<input required type="password" id="senha" name="senha" class="form-control">`,
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#ff0000",
            confirmButtonText: "Continuar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                let senha = $('#senha').val();
                $.ajax({
                    url: `/confirmarComSenha`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { senha: senha },
                    success: function (response) {
                        if (response) {
                            toastr.success('Senha confirmada com sucesso!');
                            resolve(true); // Resolve a promessa com sucesso
                        } else {
                            toastr.error('Senha incorreta!');
                            resolve(false); // Resolve como falso
                        }
                    },
                    error: function () {
                        toastr.warning('Erro ao confirmar a senha. Tente novamente mais tarde.');
                        reject('Erro ao confirmar a senha.'); // Rejeita a promessa em caso de erro
                    }
                });
            } else {
                resolve(false); // Resolve como falso se o usuário cancelar
            }
        }).catch((error) => {
            reject(error); // Rejeita a promessa caso haja erro inesperado
        });
    });
}

function consultanNF(chave, rota) {
    return $.ajax({
        url: rota, // Rota configurada no Laravel
        type: 'GET',
        data: { chave: chave }, // Parâmetro da chave da NF-e
        dataType: 'json',
        beforeSend: function () {
            console.log('Consultando a NF-e...');
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Erro na consulta:', jqXHR.responseJSON.message || errorThrown);
    });
}