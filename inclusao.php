<!DOCTYPE html>
<html>
<head>
  <title>Inclusão de Produtos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
  <h2>Incluir Produto</h2>
  <!--Explicação detalhada da linha:
  <form>: É uma tag HTML que indica o início de um formulário.
action="salvar.php": É um atributo do formulário que especifica
para onde os dados do formulário serão enviados quando o formulário for submetido.
Nesse caso, o valor do atributo é "salvar.php", indicando que os dados do formulário serão enviados para o arquivo "salvar.php".

method="post": É um atributo do formulário que especifica o método HTTP a ser usado para enviar os dados do formulário. Nesse caso, o valor do atributo é "post", indicando que os dados serão enviados no corpo da requisição HTTP.
-->

  <form action="salvar.php" method="post">
   
  <div class="form-group">
      <label for="nome">Nome:</label>
      <!-- O campo abaixo é onde o usuário digitará o nome do produto -->
      <input type="text" class="form-control" 
      id="nome" name="nome" placeholder="Digite o nome do aluno">
  </div>

  <div class="form-group">
      <label for="sobrenome">Sobrenome:</label>
      <!-- O campo abaixo é onde o usuário digitará o nome do produto -->
      <input type="text" class="form-control" 
      id="sobrenome" name="sobrenome" placeholder="sobrenome">
  </div>

  <div class="form-group">
      <label for="email">Email:</label>
      <!-- O campo abaixo é onde o usuário digitará o nome do produto -->
      <input type="email" class="form-control"
      id="email" name="email" placeholder="Email " required>
  

    <!-- O campo abaixo é usado para definir o tipo de operação, neste caso, "inclusao" -->
    <input type="hidden" name="operacao" value="inserir">
    <!-- O botão abaixo é usado para enviar o formulário e salvar os dados do produto -->
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
  </div>
</body>
</html>