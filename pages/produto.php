<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$json = file_get_contents('produtos.json');
$produtos = json_decode($json, true);

$produtoSelecionado = null;
if ($produtos && is_array($produtos)) {
    foreach ($produtos as $p) {
        if ($p['id'] == $id) {
            $produtoSelecionado = $p;
            break;
        }
    }
}

if (!$produtoSelecionado) {
    echo "<h2>Produto não encontrado.</h2>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($produtoSelecionado['nome']); ?> | Ice Store</title>
  <link rel="icon" href="../assets/icon.webp" />
  <link rel="stylesheet" href="home.css" />
  <style>
    .produto-detalhe-container {
        display: flex;
        background-color: white;
        margin: 30px 0;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .produto-imagem {
        width: 50%;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .produto-imagem img {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
    }

    .produto-info {
        width: 50%;
        padding: 20px;
        position: relative;
    }

    .produto-info h2 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #0077b6;
    }

    .produto-descricao {
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .produto-preco {
        font-size: 24px;
        font-weight: bold;
        color: #e76f51;
        margin-bottom: 30px;
    }

    .produto-acoes {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .quantidade-controle {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quantidade-controle button {
        width: 30px;
        height: 30px;
        background: #f0f4f8;
        border: 1px solid #ddd;
        cursor: pointer;
        border-radius: 4px;
        color:rgb(0, 0, 0)
    }

    .btn-adicionar {
        padding: 12px 25px;
        background-color: #0077b6;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-adicionar:hover {
        background-color: #023e8a;
    }
  </style>
</head>
<body>

  <!-- Mantendo a mesma estrutura da home.php -->
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
      <img src="../assets/icon.webp" alt="Ice Store Logo"  style="height: 50px; margin-right: 10px; vertical-align: middle; top: -10px; position: relative;" />
      <h1>Ice Store</h1>
      <nav>
        <ul>
          <li><a href="home.php">Início</a></li>
          <li><a href="home.php">Produtos</a></li>
          <li><a href="#">Contato</a></li>
          <li><a href="../index.php">Sair</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="produto-detalhe-container">
        <div class="produto-imagem">
          <img src="<?php echo htmlspecialchars($produtoSelecionado['imagem']); ?>" alt="<?php echo htmlspecialchars($produtoSelecionado['nome']); ?>" />
        </div>
        
        <div class="produto-info">
          <h2><?php echo htmlspecialchars($produtoSelecionado['nome']); ?></h2>
          <p class="produto-descricao"><?php echo htmlspecialchars($produtoSelecionado['descricao']); ?></p>
          <p class="produto-preco">R$ <?php echo number_format($produtoSelecionado['preco'], 2, ",", "."); ?></p>
          
          <div class="produto-acoes">
            <div class="quantidade-controle">
              <button onclick="alterarQuantidade(-1)">-</button>
              <span id="quantidade">1</span>
              <button onclick="alterarQuantidade(1)">+</button>
            </div>
            <button class="btn-adicionar">Adicionar ao Carrinho</button>
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

  <script>
    
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('active');
    }
    
function alterarQuantidade(alteracao) {
        const elemento = document.getElementById('quantidade');
        let quantidade = parseInt(elemento.textContent);
        quantidade += alteracao;
        if (quantidade < 1) quantidade = 1;
        elemento.textContent = quantidade;
    }
  </script>
</body>
</html>