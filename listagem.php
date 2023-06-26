<?php include "header.php" ?>


<!--MODAL-->
<div class="modal fade" id="modal-info">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Detalhes do aluno</h4>

        <button type="button " class="close" data-dismiss="modal"><i><svg class="bg-danger" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
            </svg></i></button>
      </div>
      <div class="modal-body bg-info">
        <p>ID: <span id="alunoId"></span></p>
        <p>Nome: <span id="alunoName"></span></p>
        <p>Sobrenome: <span id="alunoSobrenome"></span></p>
        <p>Email: <span id="alunoEmail"></span></p>
      </div>
    </div>
  </div>
</div>


<!--CONTAINER COM A TABELA-->
<div class="container">
  <h2 class="text-center mb-3">Lista de Alunos</h2>



  <?php
  include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

  $sql = "SELECT * FROM aluno"; // Consulta SQL para obter todos

  //filta busca somente string
  $busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
  $format = filter_input(INPUT_GET, 'format');
  
  
  $condicoes = [
    strlen($busca) ? 'WHERE nome LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null
  ];
  //trasnforma conticoes em uma string
  $filtroNome = implode(' AND ', $condicoes);


  //juntar strings
  $sql2 = "$sql $filtroNome";

  $result = $conn->query($sql2); // Executa a consulta
  if ($conn->error) {
    die("Erro na consulta: " . $conn->error); // Se houver um erro na consulta, interrompe a execução do script
  }
  ?>


  <section>

  </section>



  <div class="container-fluid ">
    <form class="  d-flex justify-content-center" action="" method="get">
      <div class="input-group w-50 ">
        <input type="text" name="busca" class="form-control  " placeholder="...Buscar nome" aria-label="Input group example" aria-describedby="basic-addon1" value="<?= $busca ?>">
        
        <select  name="format" class="form-select" aria-label="Default select example">
      <option >Menu</option>
      <option value="card" <?=$format == "list" ? 'selected': '' ?>>Card</option>
      <option value="table" <?=$format == "table" ? 'selected': '' ?>>Tabela</option>
    </select>
        <button class="input-group-text" id="basic-addon1">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
          </svg>
        </button>
      </div>

      
    </form>


   
    <?=$format == 'table' ?include "formatTable.php" : include "formatList.php" ?>

   

  </div>

</div>


<?php include 'footer.php'; ?>













<script>
  $(document).ready(function() {

    //Isso seleciona todos os elementos com a classe CSS "delete-btn" e atribui a eles um manipulador de evento de clique.
    $(".delete-btn").click(function(e) {
      e.preventDefault();
      // Obtém o ID do produto a ser excluído a partir do atributo 'data-id' do botão. O "this" se refere ao elemento atual que disparou o evento de clique.
      var alunoId = $(this).data('id');

      /*Exibe uma caixa de diálogo de confirmação ao usuário com a mensagem "Tem certeza de que deseja excluir este produto?".
      A função "confirm" retorna um valor booleano: "true" se o usuário clicar em "OK" e "false" se o usuário clicar em "Cancelar".*/
      var userConfirmation = confirm('Tem certeza de que deseja excluir este aluno da lista?'); // Exibe uma mensagem de confirmação ao usuário
      if (userConfirmation) {
        window.location.href = "excluir.php?id=" + alunoId; // Se confirmado, redireciona para a página "excluir.php" passando o ID do produto como parâmetro
      }
    });

    $(".fa-eye").click(function() {
      var $row = $(this).closest("div"); // Obtém a linha (tr) mais próxima do ícone de visualização clicado
      var alunoId = $row.find("h5:nth-child(4)").text(); // Obtém o ID do produto da primeira célula (td) da linha
      var alunoName = $row.find("h5:nth-child(1)").text();
      var alunoSobrenome = $row.find("h5:nth-child(2)").text();
      var alunoEmail = $row.find("p:nth-child(3)").text(); // Obtém o valor do produto da terceira célula (td) da linha

      $("#alunoId").text(alunoId); // Define o ID do produto no elemento com o ID "alunoId"
      $("#alunoName").text(alunoName);
      $("#alunoSobrenome").text(alunoSobrenome);
      $("#alunoEmail").text(alunoEmail); // Define o nome do produto no elemento com o ID "alunoName"
      $("#modal-info").modal(); // Abre o modal com os detalhes do produto
    });

  $(".fa-eye2").click(function() {
      var $row = $(this).closest("tr"); // Obtém a linha (tr) mais próxima do ícone de visualização clicado
      var alunoId = $row.find("th:nth-child(1)").text(); // Obtém o ID do produto da primeira célula (td) da linha
      var alunoName = $row.find("td:nth-child(2)").text();
      var alunoSobrenome = $row.find("td:nth-child(3)").text();
      var alunoEmail = $row.find("td:nth-child(4)").text(); // Obtém o valor do produto da terceira célula (td) da linha

      $("#alunoId").text(alunoId); // Define o ID do produto no elemento com o ID "alunoId"
      $("#alunoName").text(alunoName);
      $("#alunoSobrenome").text(alunoSobrenome);
      $("#alunoEmail").text(alunoEmail); // Define o nome do produto no elemento com o ID "alunoName"
      $("#modal-info").modal(); // Abre o modal com os detalhes do produto
    });
  });
</script>
</body>

</html>