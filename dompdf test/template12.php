<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
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
                   
            $data = json_decode($data, true);
            echo $data[0]['dohodak'];


            if(isset($_POST['dohodak']) &&  ($_POST['dohodak'] != '')){
                
                    echo "My selected code: ".$_POST['dohodak'];
                } else {
                    echo "something else";
                die();
             }
             
        ?>
        <div id="customers">
            
            <div id="container">
                
                <form id="pricingform" method="GET">
                    
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
                            <output id="rashodi" name="rashodi"> = KM <?php   ?></output>
                        </div>
                        <div class="col-1-1-2">
                            <label> 4.  Priznati rashodi (3 x 20%)</label>
                            <output id="priznati" name="priznati"> = KM <?php  ; ?></output>
                        </div>
                        <div class="col-1-1-3">
                            <label> 5.  Osnovica za doprinos za zdravstveno osiguranje (1 - 2)</label>
                            <output id="ozdravstveno" name="ozdravstveno"> = KM <?php  ?></output>
                        </div>
                        <div class="col-1-1-4">
                            <label> 6.  Doprinos za zdravstveno osiguranje (3 x 4%)</label>
                            <output id="dzdravstveno" name="dzdravstveno"> = KM <?php  ?></output>
                        </div>
                        <div class="col-1-1-5">
                            <label> 7.  Osnovica za porez na dohodak (3 - 4)</label>
                            <output id="dohodak" name="dohodak"> = KM <?php  ?></output>
                        </div>
                        <div class="col-1-1-6">
                            <label> 8.  Porez na dohodak (5 x 10%)</label>
                            <output id="pdohodak" name="pdohodak"> = KM <?php ?></output>
                        </div>
                        <div class="col-1-1-7">
                            <label> 9.  Naknada po odbitku zdravstva i poreza </label>
                            <output id="npozip" name="npozip"> = KM <?php   ?></output>
                        </div>
                        <div class="col-1-1-8">
                            <label> 10. Priznati troškovi </label>
                            <output id="ptroskovi" name="ptroskovi"> = KM <?php  ?></output>
                        </div> 
                        <div class="col-1-1-9">
                            <label> 11.  Doprinos za PIO (3 x 6%)</label>
                            <output id="dpio" name="dpio"> = KM <?php  ?></output>
                        </div>
                        <div class="col-1-1-10">
                            <label> 12.  Za isplati (3 - 6 - 8)</label>
                            <output id="isplata" name="isplata" > = KM <?php   ?></output>
                        </div>
                        <div class="col-1-1-11">
                            <label> 13.  Naknada za zaštitu od priodnih i drugih nesreća (10 x 0.5%)</label>
                            <output id="naknada" name="naknada"> = KM <?php   ?></output>
                        </div>
                        <div class="col-1-1-12">
                            <label> 14.  Opšta vodna naknada (10 x 0.5%)</label>
                            <output id="vnaknada" name="vnaknada"> = KM <?php   ?></output>
                        </div>>vnaknada
                        <div class="col-1-1-13">
                            <label> 15.  Ukupno troškovi po osnovu Ugovora (6 + 8 + 9 + 10 + 11 + 12)</label>
                            <output id="utroskovi" name="utroskovi" > = KM <?php   ?></output>
                        </div>
                        <div class="col-1-1-14">
                            <label> 16.  Ukupna stopa poreza, doprinosa i posebnih naknada </label>
                            <output id="usporeza" name="usporeza"> = KM <?php  ?></output>
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
                            <output id="niznos" name="niznos"> = KM <?php  ?></output>
                        </div>
                        <div class="col-2-1-2">
                            <label> 2. Zdravstvo 89,80% kantona </label>
                            <output id="zkantona" name="zkantona"> = KM <?php  ?></output>
                        </div>
                        <div class="col-2-1-3">
                            <label> 3. Zdravstvo 10,20% federacije </label>
                            <output id="zfederacije" name="zfederacije"> = KM <?php  ?></output>
                        </div>
                        <div class="col-2-1-4">
                            <label> 4. Iznos porez 10% </label>
                            <output id="iporez" name="iporez"> = KM <?php  ?></output>
                        </div>
                        <div class="col-2-1-5">
                            <label> 5. PIO 6% </label>
                            <output id="zpio" name="zpio"> = KM <?php ?></output>
                        </div>
                        <div class="col-2-1-6">
                            <label> 6. Zaštita od prirodnih nepogoda </label>
                            <output id="zonesr" name="zonesr"> = KM <?php  ?></output>
                        </div>
                        <div class="col-2-1-7">
                            <label> 7. Opšta vodna naknada </label>
                            <output id="ovnak" name="ovnak"> = KM <?php ?></output>
                        </div> <br/>
                    </div>
                </form>
            </div>
        </div> 
    </body>
</html>