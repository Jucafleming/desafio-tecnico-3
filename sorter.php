<?php
// Função para intercalar duas metades ordenadas de um array
function merge(&$array, $left, $mid, $right, $order) {
    $n1 = $mid - $left + 1;
    $n2 = $right - $mid;

    // Cria arrays temporários
    $L = [];
    $R = [];

    // Copia os dados para os arrays temporários L[] e R[]
    for ($i = 0; $i < $n1; $i++)
        $L[$i] = $array[$left + $i];
    for ($j = 0; $j < $n2; $j++)
        $R[$j] = $array[$mid + 1 + $j];

    // Intercala os arrays temporários de volta no array[$left..$right]
    $i = 0; // Índice inicial do primeiro subarray
    $j = 0; // Índice inicial do segundo subarray
    $k = $left; // Índice inicial do array intercalado
    while ($i < $n1 && $j < $n2) {
        if (($order === 'asc' && $L[$i] <= $R[$j]) || ($order === 'desc' && $L[$i] >= $R[$j])) {
            $array[$k] = $L[$i];
            $i++;
        } else {
            $array[$k] = $R[$j];
            $j++;
        }
        $k++;
    }

    // Copia os elementos restantes de L[], se houver algum
    while ($i < $n1) {
        $array[$k] = $L[$i];
        $i++;
        $k++;
    }

    // Copia os elementos restantes de R[], se houver algum
    while ($j < $n2) {
        $array[$k] = $R[$j];
        $j++;
        $k++;
    }
}

// Função principal que implementa o merge sort
function mergeSort(&$array, $left, $right, $order) {
    if ($left < $right) {
        // Encontra o ponto médio para dividir o array em duas metades
        $mid = floor(($left + $right) / 2);

        // Chama a função recursivamente para ordenar a primeira e a segunda metade
        mergeSort($array, $left, $mid, $order);
        mergeSort($array, $mid + 1, $right, $order);

        // Intercale as duas metades ordenadas
        merge($array, $left, $mid, $right, $order);
    }
}

// Função para ordenar um arquivo externo
function ordenarArquivo($nomeArquivoEntrada, $nomeArquivoSaida, $order = 'asc') {
    // Abre o arquivo de entrada para leitura
    $file = fopen($nomeArquivoEntrada, 'r');

    // Lê os números do arquivo de entrada e armazena em um array
    $numbers = [];
    while (!feof($file)) {
        $line = trim(fgets($file));
        if ($line !== '') {
            $numbers[] = intval($line);
        }
    }
    fclose($file);

    // Ordena o array usando merge sort
    mergeSort($numbers, 0, count($numbers) - 1, $order);

    // Abre o arquivo de saída para escrita
    $file = fopen($nomeArquivoSaida, 'w');

    // Escreve os números ordenados no arquivo de saída
    foreach ($numbers as $number) {
        fwrite($file, $number . PHP_EOL);
    }
    fclose($file);

    echo "Arquivo ordenado gerado com sucesso: $nomeArquivoSaida";
}

// Uso: chame a função ordenarArquivo com o nome do arquivo de entrada, nome do arquivo de saída e ordem desejada ('asc' para ascendente ou 'desc' para descendente)
// Exemplo de uso:
ordenarArquivo('input.txt', 'output.txt', 'desc');
?>
