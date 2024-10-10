<?php  
//ele inicia a sessão
session_start();

//verifica se o user está logado
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projeto_snct";
$conn = new mysqli($servername, $username, $password, $dbname);

//verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

//pega a matrícula do usuário da sessão
$matricula = $_SESSION['login'];  //usando 'matricula' em vez de 'login'

//consulta a matricula na tabela usuarios para procurar os dados do usuário logado
$sql = "SELECT * FROM usuarios WHERE matricula = '$matricula'";
$result = $conn->query($sql);

//verificação para saber se ele está logado
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    //pega o 'nome_completo' do usuário logado e exibe na tela(linha 56)
    $nome_completo = $row['nome_completo'];
} else {
    echo "Erro: Dados do usuário não encontrados.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuário</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php
    include 'requireORinclude\cabecalho.php';
    ?>
    <h1>Bem-vindo, <?php echo $nome_completo; ?>!</h1>

</body>

</html>