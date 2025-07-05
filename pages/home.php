<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ice Store - Loja</title>
  <link rel="icon" href="../assets/icon.webp">
  <link rel="stylesheet" href="home.css">
</head>
<body>

  <div class="menu-btn" onclick="toggleSidebar()">☰</div>

  <div id="sidebar" class="sidebar">
    <div class="sidebar-content">
      <div class="imagem-meio"></div> 
      <div class="sidebar-rodape">
        <p>Contato: gabriel.przygoda@escola.pr.gov.br</p>
        <p><a href="https://github.com/antness-s" target="_blank">GitHub</a></p>
      </div>
    </div>
  </div>

  <header>
    <div class="container">
      <img src="../assets/icon.webp" alt="Ice Store Logo"  style="height: 50px; margin-right: 10px; vertical-align: middle; top: -10px; position: relative;">
      <h1>Ice Store</h1>
      <nav>
        <ul>
          <li><a href="#">Início</a></li>
          <li><a href="#">Produtos</a></li>
          <li><a href="#">Contato</a></li>
          <li><a href="../index.php">Sair</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="boas-vindas">
    <div class="container">
      <h2>Bem-vindo(a), <?php echo $_SESSION['usuario']; ?>!</h2>
      <p>Confira nossos equipamentos de esqui e escalada!</p>
    </div>
  </section>
  
  <div class="container">
    <div class="banner-container">
      <div class="banner">
        <h2>PRONTO PRA ENCARAR O FRIO?</h2>
        <p>TECNOLOGIA, CONFORTO E PROTEÇÃO PARA TODAS AS AVENTURAS</p>
        <button class="banner-btn">CONFIRA OS MODELOS IDEAIS</button>
      </div>
    </div>
  </div>

  <main>
    <div class="container">
      <h2>Alguns produtos:</h2>
      <div class="produtos-container">
        <?php
          // Carrega o JSON com os produtos
          $json = file_get_contents('produtos.json');
          $produtos = json_decode($json, true);

          if ($produtos && is_array($produtos)) {
            foreach ($produtos as $produto) {
              echo '<div class="produto-linha">';
              echo '<div class="imagem-produto">';
              echo '<img src="' . htmlspecialchars($produto["imagem"]) . '" alt="' . htmlspecialchars($produto["nome"]) . '">';
              echo '</div>';
              echo '<div class="info-produto">';
              echo '<h3>' . htmlspecialchars($produto["nome"]) . '</h3>';
              echo '<p class="descricao">' . htmlspecialchars($produto["descricao"]) . '</p>';
              echo '<p class="preco">R$ ' . number_format($produto["preco"], 2, ",", ".") . '</p>';
              echo '<a href="produto.php?id=' . urlencode($produto["id"]) . '"><button>Comprar</button></a>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<p>Não há produtos disponíveis no momento.</p>';
          }
        ?>
      </div>
    </div>
  </main>

  <footer>
    <div class="container">
      <p>&copy; 2025 Ice Store. Todos os direitos reservados.</p>
    </div>
  </footer>

  <script src="home.js"></script>
</body>
</html>
