<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
        <style>
            body {
                height: auto;
                width: auto;
                padding-left: 20%;
                padding-right: 20%  ;
                justify-content: center;
                align-items: center;
            }
            
            #unos1, output {
                justify-content: center;
                float: right;
                align-items: baseline;
            }

            #greska {
                border: 1px solid red;
                display: none;
            }
        </style>
    </head>
    <body>
        <?php

            $obj = json_decode($testJSON, false);

        ?>
        <div id="customers">
            
            <div id="container">
                
                <form id="pricingform" method="POST"  oninput="kalkulator();">
                    
                    <div class="price-row grid">
                        <div class="col-1-1">
                            1.  Ugovorena neto naknada: <input type="text" name="unos1" id="unos1" >
                        </div> <br/>
                        <div class="col-1-2">
                        <label> 2.  Koeficijent</label>
                        <output type="" name="koef" id="koef">1.122083</output>
                        </div>
                        <div class="col-1-1-1">
                            <label> 3.   Osnovica za obračun poreza doprinosa (rb.1/0,8912) (1 x 2) </label>
                            <output id="rashodi" name="rashodi"> = KM <?php $obj["rashodi"]; ?></output>
                        </div>
                        <div class="col-1-1-2">
                            <label> 4.  Priznati rashodi (3 x 20%)</label>
                            <output id="priznati" name="priznati"> = KM <?php echo $obj["priznati"] ?></output>
                        </div>
                        <div class="col-1-1-3">
                            <label> 5.  Osnovica za doprinos za zdravstveno osiguranje (1 - 2)</label>
                            <output id="ozdravstveno" name="ozdravstveno"> = KM <?php echo $obj["ozdravstveno"]; ?></output>
                        </div>
                        <div class="col-1-1-4">
                            <label> 6.  Doprinos za zdravstveno osiguranje (3 x 4%)</label>
                            <output id="dzdravstveno" name="dzdravstveno"> = KM <?php echo $obj["myObj"][1]["dzdravstveno"] ?></output>
                        </div>
                        <div class="col-1-1-5">
                            <label> 7.  Osnovica za porez na dohodak (3 - 4)</label>
                            <output id="dohodak" name="dohodak"> = KM <?php echo $obj->dohodak ?></output>
                        </div>
                        <div class="col-1-1-6">
                            <label> 8.  Porez na dohodak (5 x 10%)</label>
                            <output id="pdohodak" name="pdohodak"> = KM <?php echo $obj->pdohodak ?></output>
                        </div>
                        <div class="col-1-1-7">
                            <label> 9.  Naknada po odbitku zdravstva i poreza </label>
                            <output id="npozip" name="npozip"> = KM <?php echo $obj->dpio ?></output>
                        </div>
                        <div class="col-1-1-8">
                            <label> 10. Priznati troškovi </label>
                            <output id="ptroskovi" name="ptroskovi"> = KM <?php echo $obj->isplata ?></output>
                        </div> 
                        <div class="col-1-1-9">
                            <label> 11.  Doprinos za PIO (3 x 6%)</label>
                            <output id="dpio" name="dpio"> = KM <?php echo $obj->naknada ?></output>
                        </div>
                        <div class="col-1-1-10">
                            <label> 12.  Za isplati (3 - 6 - 8)</label>
                            <output id="isplata" name="isplata" > = KM <?php echo $obj->vnaknada ?></output>
                        </div>
                        <div class="col-1-1-11">
                            <label> 13.  Naknada za zaštitu od priodnih i drugih nesreća (10 x 0.5%)</label>
                            <output id="naknada" name="naknada"> = KM <?php echo $obj->utroskovi ?></output>
                        </div>
                        <div class="col-1-1-12">
                            <label> 14.  Opšta vodna naknada (10 x 0.5%)</label>
                            <output id="vnaknada" name="vnaknada"> = KM <?php echo $obj->usporeza ?></output>
                        </div>
                        <div class="col-1-1-13">
                            <label> 15.  Ukupno troškovi po osnovu Ugovora (6 + 8 + 9 + 10 + 11 + 12)</label>
                            <output id="utroskovi" name="utroskovi" > = KM <?php echo $obj->npozip ?></output>
                        </div>
                        <div class="col-1-1-14">
                            <label> 16.  Ukupna stopa poreza, doprinosa i posebnih naknada </label>
                            <output id="usporeza" name="usporeza"> = KM <?php echo $obj->ptroskovi ?></output>
                        </div>
                        
                        <p id="napomena" style="font-weight: bolder; font-size: 65%; margin-top: 1%; margin-left: 6%; margin-right: 6%;">
                        <b style="color:red">NAPOMENA: </b> Zbog zaokruženja moguća je razlika u feninzima između rednog broja 1 i 10! 
                        </p>
                    </div>
                    <br/>
                    <div class="uplatnice-row-grid">
                        <p style="text-align: center;"><b>Uplatnice:</b></p>
                        <div class="col-2-1-1">
                            <label> 1. Neto iznos naknde </label>
                            <output id="niznos" name="niznos"> = KM <?php echo $obj->niznos ?></output>
                        </div>
                        <div class="col-2-1-2">
                            <label> 2. Zdravstvo 89,80% kantona </label>
                            <output id="zkantona" name="zkantona"> = KM <?php echo $obj->zkantona ?></output>
                        </div>
                        <div class="col-2-1-3">
                            <label> 3. Zdravstvo 10,20% federacije </label>
                            <output id="zfederacije" name="zfederacije"> = KM <?php echo $obj->zfederacije ?></output>
                        </div>
                        <div class="col-2-1-4">
                            <label> 4. Iznos porez 10% </label>
                            <output id="iporez" name="iporez"> = KM <?php echo $obj->iporez ?></output>
                        </div>
                        <div class="col-2-1-5">
                            <label> 5. PIO 6% </label>
                            <output id="zpio" name="zpio"> = KM <?php echo $obj->zpio ?></output>
                        </div>
                        <div class="col-2-1-6">
                            <label> 6. Zaštita od prirodnih nepogoda </label>
                            <output id="zonesr" name="zonesr"> = KM <?php echo $obj->zonesr ?></output>
                        </div>
                        <div class="col-2-1-7">
                            <label> 7. Opšta vodna naknada </label>
                            <output id="ovnak" name="ovnak"> = KM <?php echo $obj->ovnak ?></output>
                        </div> <br/>
                        <div id="button">
                            <button id="btn">Printaj</button>
                        </div>
                        
                    </div>
                    <p id="greska" style="color:red; margin-left: auto; margin-right: auto; text-align: center; width: 70%; height: auto; ">Morate unjeti pozitivan broj!</p>
                </form>
                <div id="msg">
            <pre>   </pre>
        </div>
            </div>
        </div> 
        <a href="printanje.php">Printaj</a>
        <script type="text/javascript">
            
            /*
            text = localStorage.getItem("testJSON");
                obj = JSON.parse(text);
                document.getElementById("rashodi").innerHTML = obj.rashodi;
                document.getElementById("priznati").innerHTML = obj.priznati;
                document.getElementById("ozdravstveno").innerHTML = obj.ozdravstveno;
                document.getElementById("dzdravstveno").innerHTML = obj.dzdravstveno;
                document.getElementById("dohodak").innerHTML = obj.dohodak;
                document.getElementById("pdohodak").innerHTML = obj.pdohodak;
                document.getElementById("dpio").innerHTML = obj.dpio;
                document.getElementById("isplata").innerHTML = obj.isplata;
                document.getElementById("naknada").innerHTML = obj.naknada;
                document.getElementById("vnaknada").innerHTML = obj.vnaknada;
                document.getElementById("utroskovi").innerHTML = obj.utroskovi;
                document.getElementById("usporeza").innerHTML = obj.usporeza;
                document.getElementById("npozip").innerHTML = obj.npozip;
                document.getElementById("ptroskovi").innerHTML = obj.ptroskovi;
                document.getElementById("niznos").innerHTML = obj.niznos;
                document.getElementById("zkantona").innerHTML = obj.zkantona;
                document.getElementById("zfederacije").innerHTML = obj.zfederacije;
                document.getElementById("iporez").innerHTML = obj.iporez;
                document.getElementById("zpio").innerHTML = obj.zpio;
                document.getElementById("zonesr").innerHTML = obj.zonesr;
                document.getElementById("ovnak").innerHTML = obj.ovnak;
            */
        </script>
    </body>
</html>