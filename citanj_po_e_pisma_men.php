<?php
include("sesija_menadzera.php");
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    <title>Čitanje poslate pošte (menadžer)</title>
</head>
<body>
    <?php
        include 'heder_menadzera.php';
    ?>       
    <div class="raspored-kolona">
        <div class="navigacija-sa-leve-strane">
            <table>
                <tr>
                    <td>
                        <a href ="menadzer.php"><button>Glavna stranica menadžera</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href ="upravljacka_stranica.php"><button>Upravljačka stranica</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href ="projekti_po_timovima.php"><button>Projekti po timovima</button></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href ="e_posta_men.php"><button>Pošta</button></a>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="glavni-sadrzaj">
            <div class="glavni-naslov">
                <h1>Tim Menadžment</h1>
            </div>
        
            <div class="tekst-sadrzaja">
                <?php
                $id_por = $_REQUEST['key'];
                include 'konekcija.php';

                $upit = "UPDATE `slanje_poruka` SET `pregledana_po` = 1 WHERE `idporuke` = '".$id_por."'";
                mysqli_query($kon_sa_serv, $upit);


                $upit = "SELECT * FROM `slanje_poruka` WHERE `idporuke` = '".$id_por."'";
                $result = mysqli_query($kon_sa_serv, $upit);
                while ($red = mysqli_fetch_assoc($result)) {
                    $prima_p = $red['prima'];
                    $datum_s = $red['datum_slanja'];
                    $naslov_p = $red['naslov_poruke'];
                    $tekst_p = $red['tekst_posl_poruke'];
                }
                ?>

                <div class="tekst-sadrzaja">
                    <table class="oAplikaciji" width="90%">
                        <tr>
                            <td class="float-left">
                                <h3 class="arial3">Prima:</h3>
                            </td>
                            <td>
                                <h5 class="arial3" style="text-align: left"><?php echo ucfirst($prima_p); ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="float-left">
                                <h3 class="arial3">Datum slanja:</h3>
                            </td>
                            <td>
                                <h5 class="arial3" style="text-align: left"><?php echo $datum_s; ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td class="float-left">
                                <h3 class="arial3">Naslov:</h3>
                            </td>
                            <td>
                                <h5 class="arial3" style="text-align: left"><?php echo ucfirst($naslov_p); ?></h5>
                            </td>
                        </tr>
                    </table>
                    <table width="90%" border="2">                
                        <tr>
                            <td colspan="2" style="text-align: left"><?php echo $tekst_p; ?></td>
                        </tr>
                    </table>
                </div>    
            </div>       
        </div>
        
        <div class="navigacija-sa-desne-strane">
            <table>
                <tr>
                    <td>            
                        <a href = "bris_e_pisma_po_men.php?key=<?php echo $id_por; ?>"><button>Obriši <br/>e-pismo</button></a>
                    </td>
                </tr>            
                <tr>
                    <td>
                        <a href = "poslata_e_pisma_men.php?key=<?php echo $id_por; ?>"><button>Poslata <br/>e-pisma</button></a>
                    </td>
                </tr> 
            </table>
        </div>
    </div>                
    <?php
        include 'footer.php';
    ?>
</body>
</html>

