<?php
if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];
    
    // Verificar si la expresión contiene caracteres permitidos
    if (preg_match('/^[0-9+\-*\/().\s]+$/', $expression)) {
        // Evaluar la expresión matemática
        eval("\$result = $expression;");
        
        // Devolver el resultado
        echo $result;
    } else {
        // Devolver un mensaje de error si la expresión contiene caracteres no permitidos
        echo "Expresión no válida";
    }
}
?>