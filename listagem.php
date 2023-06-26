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
  <h2 class="text-center">Lista de Alunos</h2>
  <?php
  include 'conexao.php'; // Inclui o arquivo de conexão com o banco de dados

  $sql = "SELECT * FROM aluno"; // Consulta SQL para obter todos os produtos

  $result = $conn->query($sql); // Executa a consulta
  if ($conn->error) {
    die("Erro na consulta: " . $conn->error); // Se houver um erro na consulta, interrompe a execução do script
  }
  ?>
  <div class="container-fluid">
    <div class="row row-cols-2">

      <?php while ($row = $result->fetch_assoc()) : ?>

        <div class="card bg-info mt-6">
          <img src="https://img.freepik.com/vetores-premium/homem-perfil-caricatura_18591-584<?php
                                                                                              echo rand(75, 84) ?>.jpg?w=2000" class="card-img-top" alt="...">
          <div class="card-body">
            <div class="text-section">
              <h5 class="card-title text-white"><?php echo $row['nome']; ?></h5>
              <h5 class="card-title text-white"> <?php echo $row['sobrenome']; ?></h5>
              <p class="card-text text-white"><?php echo $row['email']; ?></p>
              <h5 class="d-none"><?php echo $row['id']; ?></h5>
              <a style="cursor: pointer;" class="btn btn-outline-light"><i class="fa fa-eye btn-outline-light" aria-hidden="true"></i></a>

              <a class="btn btn-success" href="editar.php?id=<?php echo $row['id']; ?>">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
                Editar
              </a>

              <a href="#" class="btn btn-danger delete-btn" data-id="<?php echo $row['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                </svg>
                Delete</a>
            </div>

            <div class="cta-section">
              <div class="text-white"><?php echo $row['id']; ?></div>
            </div>

          </div>

        </div>
      <?php endwhile; ?>
    </div>

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
  });
</script>
</body>

</html>