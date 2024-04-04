<?php
if (isset($_GET['expression'])) {
    $expression = $_GET['expression'];
    
    if (isset($_GET['clear'])) {
        $expression = '';
        $result = '0';
    } elseif (isset($_GET['calculate'])) {
        // Verificar si la expresión contiene caracteres permitidos
        if (preg_match('/^[0-9+\-*\/().\s]+$/', $expression)) {
            // Evaluar la expresión matemática
            eval("\$result = $expression;");
        } else {
            $result = "Expresión no válida";
        }
    } else {
        $result = $expression;
    }
} else {
    $expression = '';
    $result = '0';
}

// Redirigir de vuelta a la página de la calculadora con el resultado
header("Location: index.php?expression=" . urlencode($expression) . "&result=" . urlencode($result));
exit();
?>