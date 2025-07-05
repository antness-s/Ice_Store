<?php

// Configurações do banco de dados
$host = 'localhost';
$user = 'root'; // usuário padrão do XAMPP
$password = ''; // senha padrão do XAMPP (vazia)
$database = 'ice_store'; // substitua pelo nome do seu banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Criptografia de senha (apenas para exemplo/criação de usuários)
// echo password_hash(123456, PASSWORD_DEFAULT);

// Receber dados do forms
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessar o IF quando o usuario clicar no botão de acesso do formulario


if (!empty($dados["Sendlogin"])) {
    // Preparar a consulta SQL
    $query_usuario = "SELECT id, senha FROM usuarios WHERE usuario = ? LIMIT 1";
    $stmt = $conn->prepare($query_usuario);
    $stmt->bind_param("s", $dados["usuario"]);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows == 1) {
        // Usuário encontrado, verificar senha
        $row_usuario = $resultado->fetch_assoc();
        if (md5($dados["senha_usuario"], $row_usuario['senha'])) {
            // Senha correta - iniciar sessão e redirecionar
            session_start();
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['usuario'] = $dados["usuario"];
            
            header("Location: ./pages/home.php"); // redireciona para página restrita
            exit();
        } else {
            echo "<p style='color: red'>Erro: Senha incorreta!</p>";
        }
    } else {
        echo "<p style='color: red'>Erro: Usuário não encontrado!</p>";
    }
}

?>

<!-- Inicio do formulario -->
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
 </head>
 <body>
    <div class="menu-btn" onclick="toggleSidebar()">☰</div>
    <div id="sidebar" class="sidebar">
    <div class="sidebar-content">
      <div class="sidebar-rodape">
        <p>Contato: gabriel.przygoda@escola.pr.gov.br</p>
        <p><a href="https://github.com/antness-s" target="_blank">GitHub</a></p>
      </div>
    </div>
  </div>
 </body>
  <script src="pages/home.js"></script>
 </html>
<div class="quadrado-form">
  <div class="form-pinguim">
    <img src="assets/icon.webp" alt="Ícone da loja" class="logo-lado">
    
    <div class="form-bloco">
      <h1>ICE STORE</h1>
      <form method="POST" action="">
          <label>Usuário: </label>
          <input type="text" name="usuario" placeholder="digite o usuário" required><br><br>

          <label>Senha: </label>
          <input type="password" name="senha_usuario" placeholder="digite a senha" required><br><br>

          <input type="submit" name="Sendlogin" value="Acessar">
      </form>
    </div>
  </div>
</div>
    <!-- fim do formulario -->
      

