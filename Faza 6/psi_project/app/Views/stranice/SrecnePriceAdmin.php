<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",true);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administrator",false);
        localStorage.setItem("lf",false);            
</script>




<!-- Oglasi iz baze -->


<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 5%;"> <i>Srecne price</i></h2>
<table class="table" style="margin-top: 2%; margin-bottom: 5%">
<?php
$i=0;
$putanja="'data:image/jpeg;base64,".base64_encode( $slike[8]->slika )."'";


foreach ($price as $prica) {   
    
        
        echo '<tr style="background-color: rgba(148,69,69,0.04)"><td><table class="table-borderless"><tr><td style="text-align: right"><i> Obrisi oglas: ';
        echo anchor("$controller/brisiPricu/{$prica->srecnapricaId}",'<img style=" width:30px" src='.$putanja.'></i><hr></td></tr>');
        echo '<tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $prica->slika ).'"/></td></tr><tr><td>'.$prica->opis.'</td></tr></table></tr>';
    
} 
?>

</table>