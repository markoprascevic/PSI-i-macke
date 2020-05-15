<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administrator",false);
        localStorage.setItem("lf",false);            
</script>

<style>
    td {
        width: 150px;
    }
</style>
<!-- forma na vrhu stranice -->
<form name="pretragakorisnika" method="GET" action="pretraziKorisnika" style="background-color: rgba(148,69,69,0.1)">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
         <div class="col-sm-2" style="text-align: right">
            Korisničko ime:
        </div>
        <div class="col-sm-2" style="text-align: left">
            <input type="text" name="korime" style="border-radius: 10px; background-color: white; border: 1px solid black;">
        </div>
        <div class="col-sm-2" style="text-align: center">
            <?php echo '<input type="image" style="width:40%; " src="data:image/jpeg;base64,'.base64_encode( $slike[9]->slika ).'"/>';?>
        </div>
    </div>  
</form>

<div style="color: red; font-size: 25px;"><?php if ($greska!="") echo urldecode($greska); ?></div>
<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 2%;"> <i>Korisnici</i></h2>
<table style="margin-top: 2%; margin-bottom: 5%">
<?php
    $putanja="'data:image/jpeg;base64,".base64_encode( $slike[8]->slika )."'";
    foreach( $korisnici as $korisnik){
        echo "<tr><td>Korisnik:</td><td>".$korisnik->username."</td><td>".anchor("Admin/blokiraj/{$korisnik->username}",'<img style=" width:30px" src='.$putanja.'>').'</td>';        
    }
?>
</table>