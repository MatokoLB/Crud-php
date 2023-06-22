<?php include "header.php"?>

<div class="container p5 >">
  
<div class="card-cont bg-info p-4">
  <h2>Adicionar</h2>
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
    <button type="submit" class="mt-3 btn btn-light">Salvar</button>
  </form>
</div>
  </div>


<?php include "footer.php"?>


