<!----Lazar Smiljković 0125/2017

Stranica za prikaz svih oglasa radi brisanja od strane admina
@version 1.0
---->

<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administrator",false);
        localStorage.setItem("lf",false);            
</script>


<!-- forma na vrshu stranice -->
<form name="pretragaoglasa" method="GET" action="pretraziOglas" style="background-color: rgba(148,69,69,0.1)">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
         <div class="col-sm-2" style="text-align: right">
            Korisničko ime:
        </div>
        <div class="col-sm-2" style="text-align: left">
            <input type="text" name="korime" style="border-radius: 10px; background-color: white; border: 1px solid black;">
        </div>
        <div class="col-sm-2" style="text-align: right">
            ID Oglasa:
        </div>
        <div class="col-sm-2" style="text-align: left">
            <input type="text" name="id" style="border-radius: 10px; background-color: white; border: 1px solid black;">
        </div>
        <div class="col-sm-2" style="text-align: center">
            <?php echo anchor("Admin/pretraziOglas",'<input type="image" style="width:40%; " src="data:image/jpeg;base64,'.base64_encode( $slike[9]->slika ).'"/>');?>
        </div>
    </div>  
</form>



<!-- Oglasi iz baze -->


<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 5%;"> <i>Oglasi</i></h2>
<div style="color: red; font-size: 25px;"><?php if ($greska!="") echo $greska; ?></div>
<table class="table" style="margin-top: 2%; margin-bottom: 5%">
<?php
$i=0;
$putanja="'data:image/jpeg;base64,".base64_encode( $slike[8]->slika )."'";

foreach ($oglasi as $oglas) {
   
    if(($i % 2)==0){
        echo '<tr style="background-color: rgba(148,69,69,0.04)"><td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
        echo anchor("$controller/brisanje/{$oglas->oglasId}",'<input type="image" onclick="return confirm(\' Da li ste sigurni da zelite da obrisete objavu? \');"  style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
        echo '<tr><td><i><u>Korsnik:</u> </i>'.$oglas->username.'</td><td style="text-align: right;"><i><u>ID:</u> </i>'.$oglas->oglasId.'</td></tr><tr><td colspan="2" style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $oglas->slika ).'"/></td></tr><tr><td colspan="2"><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$oglas->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$oglas->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$oglas->rasa.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$oglas->opis. '</td></tr></table></td></tr></table></td></tr></table></td>';
    }
    else {
        
        echo '<td><table class="table-borderless"> <tr><td style="text-align: right"><i> Obrisi oglas: ';
        echo anchor("$controller/brisanje/{$oglas->oglasId}",'<input type="image" onclick="return confirm(\' Da li ste sigurni da zelite da obrisete objavu? \');"  style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
        echo '<tr><td><i><u>Korsnik:</u> </i>'.$oglas->username.'</td><td style="text-align: right;"><i><u>ID:</u> </i>'.$oglas->oglasId.'</td></tr><tr><td colspan="2" style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $oglas->slika ).'"/></td></tr><tr><td colspan="2"><table class="table-bordered"><tr><td><table class="table"><tr><td><i><u>Vrsta: </u></i>'.$oglas->vrsta.'</td></tr><tr><td><i><u>Pol: </u></i>'.$oglas->pol.'</td></tr><tr><td><i><u>Rasa: </u></i>'.$oglas->rasa.'</td></tr></table></td><td><table class="table"><tr><td><i><u>Opis:</u></i></td></tr><tr><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$oglas->opis. '</td></tr></table></td></tr></table></td></tr></table></td></tr>';
    }
    $i=$i+1;
}   
if(($i % 2)==0)    echo '</tr>';
?>

</table>