# Uso do DIP (Dependency Inversion Principle) no Código PHP

O código fornecido demonstra o uso do Princípio da Inversão de Dependência (Dependency Inversion Principle - DIP) em PHP, com o objetivo de criar contas bancárias no Brasil e nos Estados Unidos de forma flexível.

## Estrutura do Código

### Interfaces

#### `ContaBancaria`
Uma interface que define o método `criarConta()`, responsável por exibir os detalhes da conta bancária.

### Classes Abstratas

#### `ContaBancariaBrasil`
Uma classe abstrata que implementa `ContaBancaria` e fornece a estrutura básica para contas bancárias no Brasil. As classes concretas que herdam dela devem implementar os detalhes específicos.

#### `ContaBancariaEUA`
Semelhante a `ContaBancariaBrasil`, mas projetada para contas bancárias nos Estados Unidos.

### Classes Concretas

#### `BancoDoBrasil`
Uma classe concreta que herda de `ContaBancariaBrasil`. Fornece detalhes específicos para contas no Banco do Brasil.

#### `CaixaEconomica`
Outra classe concreta que herda de `ContaBancariaBrasil`. Define detalhes específicos para contas na Caixa Econômica.

#### `USBank`
Uma classe concreta que herda de `ContaBancariaEUA`. Fornece detalhes específicos para contas nos Estados Unidos.

### Função `gerarContaBancaria`
Uma função que recebe uma instância de `ContaBancaria` como parâmetro e chama o método `criarConta()`.

## Utilização

1. **Instância de Conta Bancária do Banco do Brasil:**
   ```php
   gerarContaBancaria(new BancoDoBrasil());
   ```

2. **Instância de Conta Bancária da Caixa Econômica:**
   ```php
   gerarContaBancaria(new CaixaEconomica());
   ```

3. **Instância de Conta Bancária nos Estados Unidos:**
   ```php
   gerarContaBancaria(new USBank());
   ```

## Princípio da Inversão de Dependência (DIP)

O DIP é observado neste código ao utilizar interfaces e classes abstratas para definir um contrato comum (`ContaBancaria`). As classes concretas implementam esse contrato, e a função `gerarContaBancaria` depende da abstração (`ContaBancaria`) em vez de depender de classes concretas diretamente.

Essa abordagem facilita a extensão do código, tornando-o mais flexível e fácil de manter. Ao adicionar novas classes de contas bancárias, basta garantir que implementem a interface ou herdem das classes abstratas existentes. Isso promove a reutilização de código e reduz o acoplamento.

**Licença: MIT License**