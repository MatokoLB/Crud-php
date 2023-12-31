<?php
// salvar.php
include 'conexao.php'; // Conecte ao banco de dados

// Verifique se o tipo de operação está presente nos dados do formulário
if (isset($_POST['nome'], $_POST['sobrenome'],$_POST['email'], $_POST['operacao'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $operacao = $_POST['operacao'];

    // Verifique o tipo de operação para determinar a ação a ser realizada
    switch ($operacao) {
        case 'inserir':
            // Prepare a inserção dos dados no banco
            $sql = "INSERT INTO aluno (nome,sobrenome,email) VALUES (?, ?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                // Vincule as variáveis aos parâmetros da preparação
                $stmt->bind_param("sss", $nome, $sobrenome, $email);

                // Execute a instrução preparada
                if ($stmt->execute()) {
                    // Redirecione de volta à página da listagem se a inserção foi bem-sucedida
                    header('Location: listagem.php');
                    exit;
                } else {
                    echo "Erro: " . $stmt->error;
                }
            } else {
                echo "Erro: " . $conn->error;
            }
            break;
        case 'atualizar':
            // Verifique se o ID do produto está presente
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                // Prepare a atualização dos dados no banco
                $sql = "UPDATE aluno SET nome = ?, sobrenome = ?, email = ? WHERE id = ?";

                if ($stmt = $conn->prepare($sql)) {
                    // Vincule as variáveis aos parâmetros da preparação
                    $stmt->bind_param("ssi", $nome, $sobrenome, $email, $id);

                    // Execute a instrução preparada
                    if ($stmt->execute()) {
                        // Redirecione de volta à página da listagem se a atualização foi bem-sucedida
                        header('Location: listagem.php');
                        exit;
                    } else {
                        echo "Erro: " . $stmt->error;
                    }
                } else {
                    echo "Erro: " . $conn->error;
                }
            } else {
                echo "ID não fornecido.";
            }
            break;
        default:
            echo "Operação inválida.";
            break;
    }
} else {
    // Redirecione de volta à página de inclusão se os campos necessários não estiverem presentes
    header('Location: inclusao.php');
    exit;
}

// Feche a conexão
$conn->close();
?>
