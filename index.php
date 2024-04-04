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
<div class="calculator">
<form action="calculate.php" method="get">
            <div class="display">
                <?php echo isset($_GET['result']) ? $_GET['result'] : '0'; ?>
            </div>
            <input type="hidden" name="expression" value="<?php echo isset($_GET['expression']) ? $_GET['expression'] : ''; ?>">
            <div class="buttons">
                <input type="button" value="C" class="button" name="clear" onclick="clearDisplay();">
                <input type="button" value="(" class="button" name="bracket_open" onclick="appendExpression('(');">
                <input type="button" value=")" class="button" name="bracket_close" onclick="appendExpression(')');">
                <input type="button" value="/" class="button operator" name="divide" onclick="appendExpression('/');">
                <input type="button" value="7" class="button" name="seven" onclick="appendExpression('7');">
                <input type="button" value="8" class="button" name="eight" onclick="appendExpression('8');">
                <input type="button" value="9" class="button" name="nine" onclick="appendExpression('9');">
                <input type="button" value="*" class="button operator" name="multiply" onclick="appendExpression('*');">
                <input type="button" value="4" class="button" name="four" onclick="appendExpression('4');">
                <input type="button" value="5" class="button" name="five" onclick="appendExpression('5');">
                <input type="button" value="6" class="button" name="six" onclick="appendExpression('6');">
                <input type="button" value="-" class="button operator" name="subtract" onclick="appendExpression('-');">
                <input type="button" value="1" class="button" name="one" onclick="appendExpression('1');">
                <input type="button" value="2" class="button" name="two" onclick="appendExpression('2');">
                <input type="button" value="3" class="button" name="three" onclick="appendExpression('3');">
                <input type="button" value="+" class="button operator" name="add" onclick="appendExpression('+');">
                <input type="button" value="0" class="button zero" name="zero" onclick="appendExpression('0');">
                <input type="button" value="." class="button" name="decimal" onclick="appendExpression('.');">
                <input type="button" value="=" class="button operator" name="calculate" onclick="calculateResult();">
            </div>
        </form>
    </div>

    <p style="text-align: center;">Hecho por Esteban Cortés <a href="https://www.ecortes.cl" target="_blank" rel="noopener noreferrer">www.ecortes.cl</a> </p>

    <script>
        function appendExpression(value) {
            var expression = document.querySelector('input[name="expression"]').value;
            expression += value;
            window.location.href = 'calculate.php?expression=' + encodeURIComponent(expression);
        }
        
        function clearDisplay() {
            window.location.href = 'index.php';
        }
        
        function calculateResult() {
            var expression = document.querySelector('input[name="expression"]').value;
            window.location.href = 'calculate.php?expression=' + encodeURIComponent(expression) + '&calculate=true';
        }
    </script>
</body>
</html>