<?php

if (isset($_POST['message'])) {
    $message = $_POST['message'];
} else {
    die("Mensagem não recebida.");
}

$directory = "./messages";

// Verifica se o diretório existe, caso contrário, cria-o
if (!is_dir($directory)) {
    mkdir($directory, 0777, true);
}

// Obtém a lista de arquivos no diretório
$files = scandir($directory);
if ($files === false) {
    die("Erro ao ler o diretório.");
}

// Conta os arquivos ignorando "." e ".."
$num_files = count($files) - 2;

// Cria o nome do novo arquivo
$fileName = "msg-{$num_files}.txt";

// Abre o arquivo para escrita
$file = fopen("{$directory}/{$fileName}", "w");
if ($file === false) {
    die("Erro ao abrir o arquivo.");
}

// Escreve a mensagem no arquivo
fwrite($file, $message);

// Fecha o arquivo
fclose($file);

// Redireciona de volta para o index.php
header("Location: index.php");
exit();

?>
