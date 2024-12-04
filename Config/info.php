<?php
session_start();  
require 'config.php';  

    if (isset($_SESSION['usuario'])) 
    {
        $usuario = $_SESSION['usuario'];
    }
    else 
    {
        $usuario = "Invitado";
    }

$server_name = gethostname();

function getActiveIP() {
    $interfaces = shell_exec('ip addr show wlp58s0');
    if (preg_match('/inet\s+(\d+\.\d+\.\d+\.\d+)/', $interfaces, $matches)) {
        return $matches[1]; // Devuelve la IP de la interfaz
    }
    return '127.0.0.1'; // Si no encuentra la IP, devuelve 127.0.0.1 como predeterminado
}

$local_ip = getActiveIP();


$connection_status = $conn ? "Conectado" : "Error al conectar";

