<?php include "header.php" ?>

<?php
// Verificar se o ID está presente na URL
if (isset($_GET['id'])) {
  // Recuperar o ID do item a ser editado
  $id = $_GET['id'];

  // Incluir o arquivo de conexão
  include 'conexao.php';

  // Verificar se a conexão foi estabelecida com sucesso
  if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
  }

  // Verificar se os campos de nome e valor foram enviados. Na primeira vez não vai passar aqui, pq vem de metodo GET
  if (isset($_POST['nome']) && isset($_POST['sobrenome'])  && isset($_POST['email'])) {
    // Recuperar os valores dos campos do formulário
    $novoNome = $_POST['nome'];
    $novoSobrenome = $_POST['sobrenome'];
    $novoEmail = $_POST['email'];

    // Atualizar os valores do registro no banco de dados
    $sqlUpdate = "UPDATE aluno SET nome = '$novoNome', sobrenome = '$novoSobrenome', email = '$novoEmail' WHERE id = $id";

    if ($conn->query($sqlUpdate) === TRUE) {
      // Fechar a conexão com o banco de dados
      $conn->close();

      // Redirecionar para a página "listagem.php"
      header("Location: listagem.php");
      exit;
    } else {
      echo "Erro ao atualizar o registro: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    exit;
  }

  // Consultar o banco de dados para obter os valores dos campos com base no ID
  $sql = "SELECT nome, sobrenome , email FROM aluno WHERE id = $id";
  $result = $conn->query($sql);

  // Verificar se a consulta retornou algum resultado
  if ($result->num_rows > 0) {
    // Obter os valores dos campos
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $sobreNome = $row['sobrenome'];
    $email = $row['email'];
  } else {
    echo "<p>Erro: Item não encontrado.</p>";
    exit;
  }

  // Fechar a conexão com o banco de dados
  $conn->close();
} else {
  echo "<p>Erro: ID não fornecido.</p>";
  exit;
}
?>



<div class="container">
  <div class="card-cont bg-info p-4">
    <h1 class="mt-4">Página de Edição</h1>

    <form action="editar.php?id=<?php echo $id; ?>" method="POST">

      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
      </div>
      <div class="form-group">
        <label for="sobrenome">SobreNome:</label>
        <input type="text" class="form-control" id="nomesobre" name="sobrenome" value="<?php echo $sobreNome; ?>" required>
      </div>
      <div class="form-group">
        <label for="sobrenome">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
      </div>

      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="listagem.php" class="btn btn-secondary">Voltar</a>
    </form>
  </div>
</div>

<?php include "footer.php" ?>