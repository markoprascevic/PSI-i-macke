<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administraor",false);
        localStorage.setItem("lf",false);            
</script>

<table class="table" style="margin-top: 2%; margin-bottom: 5%">
<?php
    if ($oglasi==null) echo "<h2 style='text-align:center; font-style:italic; padding-top:30px;'>Ne postoji ni jedan oglas</h2>";
    $i=0;
    $putanja="'data:image/jpeg;base64,".base64_encode( $slike[8]->slika )."'";
    $udomiModel=new App\Models\UdomiModel();
    $lfModel=new App\Models\LFModel();
    foreach ($oglasi as $oglas) {
        $udomi=$udomiModel->find($oglas->oglasId);
        $lf=$lfModel->find($oglas->oglasId);
        if(($i % 2)==0 && $udomi!=null){
            echo '<tr style="background-color: rgba(148,69,69,0.04)"><td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
            echo anchor("$controller/mojBrisi/{$oglas->oglasId}",'<input type="image" onclick="return confirm(\' Da li ste sigurni da zelite da obrisete objavu? \');"  style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
            echo '</td></tr><tr><td><i><u>Korsnik:</u> </i>'.$oglas->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $oglas->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$oglas->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$oglas->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$oglas->rasa.'</td></tr><tr><td><i><u>Starost: </u></i>'.$udomi->starost.'</td></tr><tr><td><i><u>Mesto: </u></i>'.$udomi->mesto.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$oglas->opis. '</td></tr></table></td></tr></table></td></tr></table></td>';
        }
        else if ($i%2==1 && $udomi!=null) {
            echo '<td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
            echo anchor("$controller/mojBrisi/{$oglas->oglasId}",'<input type="image" onclick="return confirm(\' Da li ste sigurni da zelite da obrisete objavu? \');"  style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
            echo '</td></tr><tr><td><i><u>Korsnik:</u> </i>'.$oglas->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $oglas->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$oglas->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$oglas->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$oglas->rasa.'</td></tr><tr><td><i><u>Starost: </u></i>'.$udomi->starost.'</td></tr><tr><td><i><u>Mesto: </u></i>'.$udomi->mesto.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$oglas->opis. '</td></tr></table></td></tr></table></td></tr></table></td></tr>';
        }   
        else if(($i % 2)==0 && $lf!=null){
            echo '<tr style="background-color: rgba(148,69,69,0.04)"><td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
            echo anchor("$controller/mojBrisi/{$oglas->oglasId}",'<input type="image" onclick="return confirm(\' Da li ste sigurni da zelite da obrisete objavu? \');"  style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
            echo '</td></tr><tr><td><i><u>Korsnik:</u> </i>'.$oglas->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $oglas->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$oglas->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$oglas->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$oglas->rasa.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$oglas->opis. '</td></tr></table></td></tr></table></td></tr></table></td>';
        }
        else {
            echo '<td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
            echo anchor("$controller/mojBrisi/{$oglas->oglasId}",'<input type="image" onclick="return confirm(\' Da li ste sigurni da zelite da obrisete objavu? \');"  style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
            echo '</td></tr><tr><td><i><u>Korsnik:</u> </i>'.$oglas->username.'</td></tr><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $oglas->slika ).'"/></td></tr><tr><td><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$oglas->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$oglas->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$oglas->rasa.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$oglas->opis. '</td></tr></table></td></tr></table></td></tr></table></td></tr>';
        }
        $i=$i+1;
    }
    if(($i % 2)==0)    echo '</tr>';
?>
</table>