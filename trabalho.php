<?php
session_start();

// Inicializar array de nomes se não existir na sessão
if (!isset($_SESSION['nomes'])) {
    $_SESSION['nomes'] = array();
}

// Adicionar nome ao array
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    array_push($_SESSION['nomes'], $nome);
}

// Remover nome do array
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['remover'])) {
    $index = $_GET['remover'];
    unset($_SESSION['nomes'][$index]);
}

// Exibir lista de nomes
echo "<h2>Nomes</h2>";
echo "<ul>";
foreach ($_SESSION['nomes'] as $index => $nome) {
    echo "<li>$nome <a href='?remover=$index'>Remover</a></li>";
}
echo "</ul>";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema PHP</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>