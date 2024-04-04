<!DOCTYPE html>
<html>
<head>
    <title>Calculadora con PHP</title>
    <style>
        /* Estilos CSS para la calculadora */
      /* Background styles */
      body {
    background-image: url('bg.webp');
    background-position: center;
    background-size: cover;
    background-repeat: none;
    background-attachment: fixed;
}

/* Glassmorphism card effect */
.calculator {
    margin:auto;
    width: 300px;
    padding: 25px;
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(17, 25, 40, 0.75);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
}
        
        .display {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            text-align: right;
            font-size: 24px;
            border-radius: 5px;
            height: 40px;
            line-height: 40px;
            overflow: hidden;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }
        .button {
            background-color: #ccc;
            border: none;
            padding: 15px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #ddd;
        }
        .operator {
            background-color: #ff9500;
            color: #fff;
        }
        .zero {
            grid-column: 1 / 3;
        }
    </style>
</head>
<body>
    <div style="margin:auto; width:350px">
    <img style="text-align:center" src="https://ecortes.cl/wp-content/uploads/2020/03/logoEcortesCl-final-1.png" width="100%" alt="eCortes.cl">
</div>
    <div class="calculator card">
        <div class="display" id="display">0</div>
        <div class="buttons">
            <!-- Botones de la calculadora -->
            <input type="button" value="C" class="button" onclick="clearDisplay()">
            <input type="button" value="(" class="button" onclick="appendExpression('(')">
            <input type="button" value=")" class="button" onclick="appendExpression(')')">
            <input type="button" value="/" class="button operator" onclick="appendExpression('/')">
            <input type="button" value="7" class="button" onclick="appendExpression('7')">
            <input type="button" value="8" class="button" onclick="appendExpression('8')">
            <input type="button" value="9" class="button" onclick="appendExpression('9')">
            <input type="button" value="*" class="button operator" onclick="appendExpression('*')">
            <input type="button" value="4" class="button" onclick="appendExpression('4')">
            <input type="button" value="5" class="button" onclick="appendExpression('5')">
            <input type="button" value="6" class="button" onclick="appendExpression('6')">
            <input type="button" value="-" class="button operator" onclick="appendExpression('-')">
            <input type="button" value="1" class="button" onclick="appendExpression('1')">
            <input type="button" value="2" class="button" onclick="appendExpression('2')">
            <input type="button" value="3" class="button" onclick="appendExpression('3')">
            <input type="button" value="+" class="button operator" onclick="appendExpression('+')">
            <input type="button" value="0" class="button zero" onclick="appendExpression('0')">
            <input type="button" value="." class="button" onclick="appendExpression('.')">
            <input type="button" value="=" class="button operator" onclick="calculateResult()">
        </div>
    </div>

    <p style="text-align: center;">Hecho por Esteban Cortés <a href="https://www.ecortes.cl" target="_blank" rel="noopener noreferrer">www.ecortes.cl</a> </p>

    <script>
        // Función para agregar un valor a la expresión matemática
        function appendExpression(value) {
            var display = document.getElementById('display');
            var expression = display.innerText;
            if (expression === '0') {
                expression = value;
            } else {
                expression += value;
            }
            display.innerText = expression;
        }

        // Función para limpiar la pantalla y la expresión matemática
        function clearDisplay() {
            document.getElementById('display').innerText = '0';
        }

        // Función para calcular el resultado de la expresión matemática
        function calculateResult() {
            var expression = document.getElementById('display').innerText;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var result = xhr.responseText;
                    document.getElementById('display').innerText = result;
                }
            };
            xhr.open('POST', 'calculate.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('expression=' + encodeURIComponent(expression));
        }
    </script>
</body>
</html>