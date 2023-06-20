<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/HJR WHITE.png">
    <link rel="stylesheet" href="styles/style.css">
    <title>H.J.R</title>
</head>
<body>
    <header>
        <nav>
            <a href="../index.php" class="logo"><img src="../images/HJR BLACK.png" alt=""><h1>H.J.R</h1></a>
        </nav>
    </header>

    <section id="calculo">
        <div class="container">
            <form action="calculo.php" method="post">
                <h1>CALCULADORA DE CUOTAS</h1>
                <h2>"Por favor rellenar los campos"</h2>
                <div class="subcontainer">
                    <h3>Nombre de la deuda:</h3>
                    <input name="nlote" placeholder="Ingresar el nombre." class="textbox" type="text" required>
                </div>
                <div class="subcontainer">
                    <h3>Saldo actual:</h3>
                    <input id="txtSaldo" name="saldo" placeholder="Ingresar el saldo actual." class="textbox" type="number" step=".01" required>
                </div>
                <div class="subcontainer">
                    <h3>Cuota mensual:</h3>
                    <input id="txtCuota" name="cuota" placeholder="Ingresar la cuota mensual." class="textbox" type="number" step=".01" required> 
                </div>
                <div class="subcontainer">
                    <h3>Prima:</h3>
                    <input name="prima" placeholder="Ingresar la prima (opc)." class="textbox" type="number">
                </div>
                <div class="subcontainer">
                    <h3>Intereses %:</h3>
                    <input value= "1" name="interes" placeholder="Ingresar los intereses." class="textbox" type="number" step=".01" required>
                </div>
                <input id="btnCalcularOculto" type="submit" value="Aceptar" class="submit">
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 J2R Studio | All rights reserved </p>
        </div>
    </footer>
</body>
</html>