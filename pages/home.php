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
      <div class="imagem-meio">
        <img src="../assets/background.jpg" alt="">
      </div>

      <div class="sidebar-rodape">
        <p>Contato: contato@icestore.com</p>
        <p><a href="https://github.com/antness-s" target="_blank">GitHub</a></p>
      </div>
    </div>
  </div>

  <header>
    <div class="container">
            <img src="../assets/icon.webp" alt="Ice Store Logo"  style="height: 50px; margin-right: 10px; vertical-align: middle;">
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
            <!-- Produto 1 -->
            <div class="produto-linha">
                <div class="imagem-produto">
                    <img src="../assets/mascara.jpg" alt="Máscara de Esqui">
                </div>
                <div class="info-produto">
                    <h3>Máscara de Esqui Profissional</h3>
                    <p class="descricao">Proteção UV400 para alta montanha</p>
                    <p class="preco">R$ 249,90</p>
                    <button>Comprar</button>
                </div>
            </div>

            <!-- Produto 2 -->
            <div class="produto-linha">
                <div class="imagem-produto">
                    <img src="../assets/luva.webp" alt="Luvas Térmicas">
                </div>
                <div class="info-produto">
                    <h3>Luvas Térmicas Impermeáveis</h3>
                    <p class="descricao">Resistentes a -30°C</p>
                    <p class="preco">R$ 189,90</p>
                    <button>Comprar</button>
                </div>
            </div>

            <!-- Produto 3 -->
            <div class="produto-linha">
                <div class="imagem-produto">
                    <img src="../assets/mochila.jpeg" alt="Mochila de Montanha">
                </div>
                <div class="info-produto">
                    <h3>Mochila de Montanha 40L</h3>
                    <p class="descricao">Resistente à água e vento</p>
                    <p class="preco">R$ 349,90</p>
                    <button>Comprar</button>
                </div>
            </div>

            <!-- Produto 4 -->
            <div class="produto-linha">
                <div class="imagem-produto">
                    <img src="../assets/meia.webp" alt="Meias Térmicas">
                </div>
                <div class="info-produto">
                    <h3>Meias Térmicas Alpinas</h3>
                    <p class="descricao">Tecnologia DryFit</p>
                    <p class="preco">R$ 79,90</p>
                    <button>Comprar</button>
                </div>
            </div>
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