<?php

use Carbon\Carbon;

if (!function_exists('formatCNPJ')) {
    function formatCNPJ($cnpj)
    {
        // Lógica para formatar CNPJ
        return vsprintf('%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s', str_split($cnpj, 1));
    }
}

if (!function_exists('formatCPF')) {
    function formatCPF($cpf)
    {
        // Lógica para formatar CPF
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);
    }
}

if (!function_exists('debugException')) {
    function debugException($exception)
    {
        dd($exception->getMessage(), $exception->getFile(), $exception->getLine());
    }
}

if (!function_exists('converteDinheiroParaFloat')) {
    function converteDinheiroParaFloat($valor)
    {
        // Remove apenas os pontos que são separadores de milhares.
        $valor = preg_replace('/\.(?=\d{3},)/', '', $valor);

        // Substitui a vírgula por um ponto para a conversão decimal.
        $valor = str_replace(',', '.', $valor);

        return (float) $valor;
    }
}

function trocarPontoPorVirgula($valor)
{
    // Verifica se é numérico e converte para string, se necessário
    if (is_numeric($valor)) {
        $valor = (string)$valor;
    }
    // Substitui o ponto por vírgula
    return str_replace('.', ',', $valor);
}

function formatarQuantidade($quantidade)
{
    return str_replace(".", ",", $quantidade);
}

function limparCaracteres($string)
{
    if ($string) {
        // Remove pontos, vírgulas, parênteses e espaços da string
        $string = str_replace(['.', ',', '(', ')', '-', '/', ' '], '', $string);
        return $string;
    }
}

function converterDataParaSalvarNoBanco($data)
{
    if (!$data) {
        return null; // Retorna null se a data estiver vazia
    }
    // Substitui '/' por '-' para facilitar o parsing
    $data = str_replace('/', '-', $data);

    // Tenta interpretar a data automaticamente
    return Carbon::parse($data)->format('Y-m-d');
}

function converteQtdParaView($numero)
{
    return number_format($numero, 2, '.', '.');
}

function verificarPessoa($documento)
{
    if (strlen($documento) == 14) {
        return 'CNPJ';
    } else {
        return 'CPF';
    }
}

function aplicarMascaraDocumento($documento)
{
    if (verificarPessoa($documento) == 'CNPJ') {
        // Aplica máscara para CNPJ
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $documento);
    } else {
        // Aplica máscara para CPF
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $documento);
    }
}

function aplicarMascaraCelular($celular)
{
    if ($celular) {
        return preg_replace('/(\d{2})(\d{1})(\d{4})(\d{4})/', '($1) $2 $3-$4', $celular);
    }
}

function aplicarMascaraTelefoneFixo($telefoneFixo)
{
    if ($telefoneFixo) {
        return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefoneFixo);
    }
}

function aplicarMascaraCep($cep)
{
    if ($cep) {
        return preg_replace('/(\d{2})(\d{3})(\d{3})/', '$1.$2-$3', $cep);
    }
}

function aplicarMascaraDataNascimento($data_nascimento)
{
    if ($data_nascimento) {
        // Converte a data para o formato desejado (dia/mês/ano)
        $data_formatada = date('d/m/Y', strtotime($data_nascimento));
        return $data_formatada;
    }
}

function removeCookie($nomeCookie)
{
    // Define o caminho do cookie (deve ser o mesmo caminho em que o cookie foi definido)
    $cookie_path = "/";
    // Define o domínio do cookie (opcional, deve ser o mesmo domínio em que o cookie foi definido)
    $cookie_domain = "";
    // Define a data de expiração do cookie para uma data no passado
    setcookie($nomeCookie, "", time() - 3600, $cookie_path, $cookie_domain);
    if (isset($_COOKIE[$nomeCookie])) {
        unset($_COOKIE[$nomeCookie]);
    }
}

function somenteNumeros($string)
{
    return preg_replace('/[^0-9]/', '', $string);
}
function validarDocumento($documento)
{
    // Remove qualquer caractere não numérico
    $documento = preg_replace('/[^0-9]/', '', $documento);

    // Verifica se o documento tem 11 dígitos (CPF) ou 14 dígitos (CNPJ)
    if (strlen($documento) == 11) {
        return validarCPF($documento);
    } elseif (strlen($documento) == 14) {
        return validarCNPJ($documento);
    } else {
        return false;
    }
}

// Função para validar CPF
function validarCPF($cpf)
{
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}

// Função para validar CNPJ
function validarCNPJ($cnpj)
{
    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    $tamanho = [5, 6];
    for ($t = 0; $t < 2; $t++) {
        for ($d = 0, $p = $tamanho[$t], $c = 0; $c < 12 + $t; $c++) {
            $d += $cnpj[$c] * $p--;
            if ($p < 2) $p = 9;
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cnpj[12 + $t] != $d) {
            return false;
        }
    }

    return true;
}

function formataLikeSql($busca)
{
    return '%' . str_replace(' ', '%', $busca) . '%';
}

function formatarData($data)
{
    // Converte a string de data em um objeto DateTime
    $dateTime = new DateTime($data);

    // Formata a data para o formato desejado: "10/09/2024 às 22:03"
    return $dateTime->format('d/m/Y \à\s H:i');
}

/**
 * Converte um valor em reais para centavos.
 *
 * @param float $valor Em reais.
 * @return int Valor em centavos.
 */
function converteExibicaoParaCentavos($valor): int
{
    return intval(converteDinheiroParaFloat($valor) * 100); // Converte e retorna em centavos
}

/**
 * Converte um valor em reais para centavos.
 *
 * @param float $valor Em reais.
 * @return int Valor em centavos.
 */
function converterParaCentavos(float $valor): int
{
    return intval(round($valor * 100)); // Converte e retorna em centavos
}

/**
 * Converte um valor em centavos para reais.
 *
 * @param int $centavos Valor em centavos.
 * @return float Valor em reais.
 */
function converterParaReais(float $float)
{
    return 'R$ ' . number_format($float, 2, ',', '.'); // Converte e retorna em reais
}

function converterParaReaisSemcifrao($float)
{
    return number_format($float, 2, ',', '.'); // Converte e retorna em reais
}

function converterPontoParaVirgula($valor)
{
    return str_replace('.', ',', $valor);
}

function converterVirgulaParaPonto($valor)
{
    return str_replace(',', '.', $valor);
}

// Função para converter a imagem em Base64
function gerarImagemBase64($caminhoImagemStorage)
{
    // Caminho da imagem dentro do diretório public, baseado no CNPJ da empresa
    $caminhoImagem = storage_path($caminhoImagemStorage);

    // Verifica se o arquivo existe
    if (file_exists($caminhoImagem)) {
        // Lê o conteúdo da imagem
        $imagem = file_get_contents($caminhoImagem);

        // Converte a imagem para Base64
        $base64 = base64_encode($imagem);

        // Retorna a imagem base64 no formato correto
        return $base64;
    } else {
        // Caso a imagem não seja encontrada, retorna uma mensagem ou imagem padrão
        return null;
    }
}

function inteiroParaTime($minutos)
{
    $horas = floor($minutos / 60);
    $minutos = $minutos % 60;
    $tempoFormatado = sprintf('%02d:%02d:00', $horas, $minutos);
    return $tempoFormatado;
}
function tempoParaMinutos($tempo)
{
    // Tempo em formato H:i:s

    // Converter para um objeto Carbon
    $carbonTempo = \Carbon\Carbon::createFromFormat('H:i:s', $tempo);

    // Calcular o total em segundos
    $totalSegundos = $carbonTempo->hour * 3600 + $carbonTempo->minute * 60 + $carbonTempo->second;

    // Converter os segundos para minutos
    $totalMinutos = $totalSegundos / 60;

    // Arredondando o valor de minutos
    $totalMinutosArredondado = round($totalMinutos, 2);  // Arredondando para 2 casas decimais
    return $totalMinutosArredondado;
}
