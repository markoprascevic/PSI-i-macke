<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",true);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administrator",false);
        localStorage.setItem("lf",false);            
</script>

<!-- forma na vrshu stranice -->
<form name="pretragaLF" method="GET" action="udomiPretrazi" style="background-color: rgba(148,69,69,0.1)">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
            <div class="col-sm-4" style="text-align: center">
                Startost (u godinama):&nbsp;&nbsp;
                Od:
                <input type="number" id="starostOd" name="starostOd" value="" placeholder="Od" style="width: 50px" min="1" max="20">
                Do:
                <input type="number" id="starostDo" name="starostDo" value="" placeholder="Do" style="width: 50px" min="1" max="20">
                
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
                    <option value="musko">Mužijak</option>
                    <option value="zensko">Ženka</option>
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


<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 5%;"> <i>Oglasi</i></h2>
<table class="table" style="margin-top: 2%; margin-bottom: 5%">
<?php
$i=0;
$putanja="'data:image/jpeg;base64,".base64_encode( $slike[8]->slika )."'";
$oglasiM=new App\Models\Oglasi();

foreach ($oglasi as $oglas) {
    $glavna=$oglasiM->find($oglas->oglasId);
   
    if(($i % 2)==0){
        echo '<tr style="background-color: rgba(148,69,69,0.04)"><td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
        echo anchor("$controller/brisiUdomi/{$glavna->oglasId}",'<img style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
        echo '</td></tr><tr><td><i><u>Korsnik:</u> </i>'.$glavna->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $glavna->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$glavna->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$glavna->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$glavna->rasa.'</td></tr><tr><td><i><u>Starost: </u></i>'.$oglas->starost.'</td></tr><tr><td><i><u>Mesto: </u></i>'.$oglas->mesto.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$glavna->opis. '</td></tr></table></td></tr></table></td></tr></table></td>';
    }
    else {
        
        echo '<td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
        echo anchor("$controller/brisiUdomi/{$glavna->oglasId}",'<img style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
        echo '</td></tr><tr><td><i><u>Korsnik:</u> </i>'.$glavna->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $glavna->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$glavna->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$glavna->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$glavna->rasa.'</td></tr><tr><td><i><u>Starost: </u></i>'.$oglas->starost.'</td></tr><tr><td><i><u>Mesto: </u></i>'.$oglas->mesto.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$glavna->opis. '</td></tr></table></td></tr></table></td></tr></table></td></tr>';
    }
    $i=$i+1;
}   
if(($i % 2)==0)    echo '</tr>';
?>

</table>