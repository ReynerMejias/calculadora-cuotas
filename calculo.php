<?php
ob_start(); 

$nlote = $_POST['nlote'];
$saldoAct = $_POST['saldo'];
$saldoAnt = $_POST['saldo'];
$cuota = $_POST['cuota'];
$prima = $_POST['prima'];
$porceinteres = $_POST['interes'];
$abono = 0;
$intereses = 0;
$ncouta = 0;
$fecha = date("Y-m-d mm:ss");
$totalCuotas = 0;
$totalIntereses = 0;
$totalAbono = 0;
$tiempoRestante = "404?error";
$porceinteres = $porceinteres / 100;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/HJR WHITE.png">
    <link rel="stylesheet" href="styles/style.css" >
    <title>Calculo de tiempo restante</title>
</head>

<body class="resultadoBody">
  <section id="resultado">
        <div class="container">

            <table class="tablaCalc"> <tr id="Columna-Titulo"> <th colspan=6>CALCULO DE CUOTAS</th> </tr>
                <?php
                echo "<tr id=Columna-Lote> <th colspan=6>$nlote</th> </tr>";
                ?>
            

        
            <tr> <th>N CUOTAS</th> <th>SALDO ANT</th> <th>CUOTA</th> <th>INTERESES</th> <th>ABONO</th> <th>SALDO ACT</th> </tr>
        
            <?php 
            
            if ($prima > 0) {
                $saldoAct = $saldoAct - $prima;
                $totalAbono = $totalAbono + $prima;
                $saldoAct_NF = number_format($saldoAct, 2);
                $saldoAnt_NF = number_format($saldoAnt, 2);
                $prima_NF = number_format($prima, 2);  

                echo "<tr> <th>$ncouta</th> <th>$saldoAnt_NF</th> <th>0.00</th> <th>0.00</th> <th>$prima_NF</th> <th>$saldoAct_NF</th> </tr>";
                $ncouta = $ncouta + 1;
            }

            if ($prima < 0) {
                $saldoAct_NF = number_format($saldoAct, 2);
                $saldoAnt_NF = number_format($saldoAnt, 2); 
            
                echo "<tr> <th>$ncouta</th> <th>$saldoAnt_NF</th> <th>0.00</th> <th>0.00</th> <th>0.00</th> <th>$saldoAct_NF</th> </tr>";
                $ncouta = $ncouta + 1;
            }

            while ($cuota < $saldoAct) {

                if ($saldoAnt < $saldoAct) {
                    ?>
                    <script>
                    window.location.replace("inicio.php");
                    alert("Error en el calculo, por favor revisar que los datos fueron ingresados correctamente!");
                    </script>
                    <?php
                }

                $saldoAnt = $saldoAct;
                $intereses = $saldoAnt * $porceinteres;
                $abono = $cuota - $intereses;
                $saldoAct = $saldoAnt - $abono;

                $totalAbono = $totalAbono + $abono;
                $totalCuotas = $totalCuotas + $cuota;
                $totalIntereses = $totalIntereses + $intereses;

                $saldoAct_NF = number_format($saldoAct, 2);
                $saldoAnt_NF = number_format($saldoAnt, 2); 
                $cuota_NF = number_format($cuota, 2);
                $abono_NF = number_format($abono, 2); 
                $intereses_NF = number_format($intereses, 2); 
            
                    echo "<tr> <th>$ncouta</th> <th>$saldoAnt_NF</th> <th>$cuota_NF</th> <th>$intereses_NF</th> <th>$abono_NF</th> <th>$saldoAct_NF</th> </tr>";
        
                $ncouta = $ncouta + 1;
            }


            if ($cuota > $saldoAct) {
                $saldoAnt = $saldoAct;
                $intereses = $saldoAnt * $porceinteres;
                $abono = $saldoAnt;
                $cuota = $saldoAnt + $intereses;
                $saldoAct = $saldoAnt - $abono;

                $totalAbono = $totalAbono + $abono;
                $totalCuotas = $totalCuotas + $cuota;
                $totalIntereses = $totalIntereses + $intereses;

                $saldoAct_NF = number_format($saldoAct, 2);
                $saldoAnt_NF = number_format($saldoAnt, 2); 
                $cuota_NF = number_format($cuota, 2);
                $abono_NF = number_format($abono, 2); 
                $intereses_NF = number_format($intereses, 2); 

                echo "<tr> <th>$ncouta</th> <th>$saldoAnt_NF</th> <th>$cuota_NF</th> <th>$intereses_NF</th> <th>$abono_NF</th> <th>$saldoAct_NF</th> </tr>";
            }
            echo "</table>";
            ?>
            
            <table id="tabla2" class="tablaCalc">

            <?php
                $entero = $ncouta / 12;
                $entero = intval($entero);
                $decimal = $ncouta / 12;
                $decimal = $decimal - $entero;
                $verifDecimal = 0.00;
                $meses = 0;

                while ($verifDecimal < $decimal) {
                    $meses += 1;
                    $verifDecimal = $meses / 12;
                }
                
                $meses -= 1;

                $tiempoRestante = "$entero años y $meses meses.";

                $totalCuota_NF = number_format($totalCuotas, 2);
                $totalAbono_NF = number_format($totalAbono, 2); 
                $totalIntereses_NF = number_format($totalIntereses, 2); 
                echo "<tr> <th>Total de intereses</th> <th> $totalIntereses_NF</th> </tr> ";
                echo "<tr> <th>Total de cuotas</th> <th>$totalCuota_NF</th> </tr> ";
                echo "<tr> <th>Total de abono</th> <th>$totalAbono_NF</th> </tr> ";
                echo "<tr> <th>Tiempo restante</th> <th>$tiempoRestante</th> </tr> ";
                echo "</table>";
            ?>
        </div>
    </section>
</body>
</html>

<?php

$html=ob_get_clean();
//echo $html;

require_once './libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf(['chroot' => __DIR__]);

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->set_base_path( __DIR__ );
$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream( "$nlote $fecha.pdf", array("Attachment" => false));
