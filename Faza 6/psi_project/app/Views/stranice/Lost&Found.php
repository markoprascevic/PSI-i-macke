<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administraor",false);
        localStorage.setItem("lf",true);            
</script>

<!-- forma na vrshu stranice -->
<form name="pretragaLF" method="GET" action="" style="background-color: rgba(148,69,69,0.1)">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
         <div class="col-sm-2" style="text-align: right">
                <input type="radio" id="izgubljen" name="izgpro" value="izgubljen">
                Izgubljen
            </div>
            <div class="col-sm-2" style="text-align: center">
                <input type="radio" id="izgubljen" name="izgpro" value="izgubljen">
                Pronađen 
            </div>
            <div class="col-sm-1" style="text-align: left">
                <select id="vrsta" name="vrsta">
                    <option value="vrsta">Vrsta</option>
                    <option value="pas">Pas</option>
                    <option value="macka">Mačka</option>
                </select>
            </div>
            <div class="col-sm-1" style="text-align: center">
                <select id="pol" name="pol">
                    <option value="pol">Pol</option>
                    <option value="muzijak">Mužijak</option>
                    <option value="zenka">Ženka</option>
                </select>         
            </div>
            <div class="col-sm-2">
                <input type="text" id="rasa" name="rasa" value="" placeholder="Unesite rasu">
            </div>
            
            <div class="col-sm-2" style="text-align: center">
                <?php echo '<input type="image" style="width:40%; " src="data:image/jpeg;base64,'.base64_encode( $slike[9]->slika ).'"/>';?>
            </div>
            <div class="col-sm-2" style="text-align: center">
                <input type="button" id="postaviLF" name="postavuLF" value="Postavi oglas">
            </div>
    </div>  
</form>



<!-- Oglasi iz baze -->