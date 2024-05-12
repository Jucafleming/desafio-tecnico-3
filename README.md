## Merge Sort PHP Implementation

Este é um código PHP que implementa o algoritmo de ordenação Merge Sort e inclui uma função para ordenar um arquivo externo contendo números inteiros.
Este algoritmo é bem adaptado para ordenar grandes conjuntos de dados, pois não requer que todos os dados estejam na memória ao mesmo tempo.
O algoritmo Merge Sort é uma técnica de ordenação eficiente que divide repetidamente a lista não ordenada em metades até que cada sublista contenha apenas um elemento. Depois, combina essas sublistas de forma ordenada, até que a lista original esteja completamente ordenada.

### Funcionalidades



1. **Ordenação de Arquivo Externo**: A função `ordenarArquivo` permite ordenar um arquivo externo contendo números inteiros. Você pode especificar o nome do arquivo de entrada, o nome do arquivo de saída e a ordem desejada para a ordenação ('asc' para ascendente ou 'desc' para descendente).
### Uso

Para usar este código, siga estas etapas:

1. **Incluir o Código**: Copie e cole o código PHP em seu projeto ou script.

2. **Chamar a Função**: Chame a função ordenarArquivo com o nome do arquivo de entrada, nome do arquivo de saída e ordem desejada ('asc' para ascendente ou 'desc' para descendente)

```php
ordenarArquivo('input.txt', 'output.txt', 'asc');
```
### Notas
**-** Certifique-se de que o arquivo de entrada esteja no formato adequado, com cada número inteiro em uma nova linha.
**-** O código assume que o arquivo de entrada está acessível e tem permissão de leitura, e que o arquivo de saída pode ser criado e gravado no diretório especificado.

### Autor
Este código foi desenvolvido por João Victor Fleming.