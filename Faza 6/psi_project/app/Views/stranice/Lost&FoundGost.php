<!----Marko Praščević 0108/2017

Stranica za prikaz Lost$Found oglasa
@version 1.0
---->

<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administraor",false);
        localStorage.setItem("lf",true);            
</script>

<!-- forma na vrshu stranice -->
<form name="pretragaLF" method="GET" action="lfPretrazi" style="background-color: rgba(148,69,69,0.1)">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%; padding-right: 0px">
            <div class="col-sm-3" style="text-align: center; width: 100%; padding-left: 3%">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="radio" id="izgubljen" name="izgpro" value="izgubljen" class = "form-control">
                        Izgubljen
                    </div>
                    <div class="col-sm-4">
                        <input type="radio" id="pronadjen" name="izgpro" value="pronadjen" class = "form-control">
                        Pronađen 
                    </div>
                    <div class="col-sm-4">
                        <input type="radio" id="pronadjen" name="izgpro" value="%" checked class = "form-control">
                        Oba
                    </div>
                </div>
                
            </div>
            <div class="col-sm-3" style="text-align: left;  padding-left: 0px">
                <div class = "row">
                    <div class="col-sm-6">
                        <select id="vrsta" name="vrsta" class = "form-control">
                            <option value="vrsta" >Vrsta</option>
                            <option value="pas">Pas</option>
                            <option value="macka">Mačka</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select id="pol" name="pol"  class = "form-control">
                            <option value="pol">Pol</option>
                            <option value="musko">Mužijak</option>
                            <option value="zensko">Ženka</option>
                        </select> 
                    </div>
                </div>
            </div>
            
            <div class="col-sm-2">
                <input type="text" id="rasa" name="rasa" value="" placeholder="Unesite rasu" class = "form-control">
            </div>
            
            <div class="col-sm-2" style="text-align: center">
                <?php echo '<input type="image" style="width:40%;"  src="data:image/jpeg;base64,'.base64_encode( $slike[9]->slika ).'"/>';?>
            </div>
            <div class="col-sm-2" style="text-align: center; padding-right: 3%" >
                <?php echo anchor("Gost/nemaPristupPostaviLF",'<input type="button" id="postaviLF" class = "form-control" name="postavuLF" value="Postavi oglas">'); ?>
            </div>
    </div>  
</form>



<!-- Oglasi iz baze -->


<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 5%;"> <i>Oglasi</i></h2>
<table class="table" style="margin-top: 2%; margin-bottom: 5%">
<?php
$i=0;
$oglasiM=new App\Models\Oglasi();

foreach ($oglasi as $oglas) {
    $glavna=$oglasiM->find($oglas->oglasId);
   
    if(($i % 2)==0){
        echo '<tr style="background-color: rgba(148,69,69,0.04)"><td><table class="table-borderless"><tr><td><i><u>Korisnik:</u> </i>'.$glavna->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $glavna->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$glavna->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$glavna->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$glavna->rasa.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$glavna->opis. '</td></tr></table></td></tr></table></td></tr></table></td>';
    }
    else {
        
        echo '<td><table class="table-borderless"><tr><td><i><u>Korisnik:</u> </i>'.$glavna->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $glavna->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$glavna->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$glavna->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$glavna->rasa.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$glavna->opis. '</td></tr></table></td></tr></table></td></tr></table></td></tr>';
    }
    $i=$i+1;
}   
if(($i % 2)==0)    echo '</tr>';
?>

</table>