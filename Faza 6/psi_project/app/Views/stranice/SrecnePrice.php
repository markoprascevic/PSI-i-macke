<!----Jovana Jelčić 0082/2017

Stranica za prikaz srecnih prica
@version 1.0
---->

<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",true);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administrator",false);
        localStorage.setItem("lf",false);            
</script>




<!-- Oglasi iz baze -->


<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 5%;"> <i>Srećne priče</i></h2>
<table class="table" style="margin-top: 2%; margin-bottom: 5%">
<?php

foreach ($price as $prica) {   
    
        
        echo '<tr style="background-color: rgba(148,69,69,0.04)"><td><table class="table-borderless"><tr><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $prica->slika ).'"/></td></tr><tr><td>'.$prica->opis.'</td></tr></table></tr>';
    
} 
?>

</table>