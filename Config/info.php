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
    $interfaces = shell_exec('ip addr show');
    if (preg_match('/inet\s+((?:\d{1,3}\.){3}\d{1,3})\/\d+\s+scope\s+(global|link)/', $interfaces, $matches)) {
        return $matches[1]; // Devuelve la IP activa
    }
    return '127.0.0.1'; // Predeterminado al loopback
}

$local_ip = getActiveIP();


$connection_status = $conn ? "Conectado" : "Error al conectar";

