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
        width: 100px;
    }
</style>

<form name="pretragazalbe" method="GET" action="zalbePretrazi" style="background-color: rgba(148,69,69,0.1)">
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
<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 2%;"> <i>Zalbe</i></h2>

<?php
    $putanja="'data:image/jpeg;base64,".base64_encode( $slike[8]->slika )."'";
    foreach( $zalbe as $zalba){
        echo "<table style='margin-top: 3%; margin-bottom: 5%'>";
        echo "<tr><td>Korisnik:</td><td><b>".$zalba->username."</b></td><td></td><td></td><td>ID: &nbsp;&nbsp;".$zalba->zalbaId."</td><td>".anchor("Admin/brisiZalbu/{$zalba->zalbaId}",'<input type="image" onclick="return confirm(\' Da li ste sigurni da zelite da obrisete zalbu? \');"  style=" width:30px" src='.$putanja.'>')."</td></tr>";
        echo "<tr><td id='opis' colspan='4'>".$zalba->opis."</td><td></td></tr>";
        echo "</table>";
    }
?>