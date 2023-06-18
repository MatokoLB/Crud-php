<?php
//conexão com aws
$server_host = "db-ads.c8bqy6anulng.sa-east-1.rds.amazonaws.com";
$server_user = "admin";
$server_password = "Unimar-ads-2023";
$server_database = "minha_base";

// Criando conexão
$conn = new mysqli($server_host, $server_user, $server_password, $server_database);

// Verificando conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
?>