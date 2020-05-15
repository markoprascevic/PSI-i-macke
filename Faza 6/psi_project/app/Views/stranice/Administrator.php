<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administrator",true);
        localStorage.setItem("lf",false);            
</script>

<style>
    input {
        width: 200px;
        border-radius: 5px;
        border: 1px solid black;
        background-color: white;
    }
</style>

<div class="row">
    <div class="offset-sm-4 col-sm-4" style="text-align: center; margin-top: 30px;">
        <h1>Opcije:</h1>
        <br>
        <br>
        <br>
        <?php echo anchor("Admin/izbrisiOglas",'<input type="button" value="Izbriši oglas">'); ?>
        <br>
        <br>
        <br>
        <?php $greska="Prvi mi je put"; echo anchor("Admin/pretraziKorisnika/Prvi mi je put",'<input type="button" value="Blokiraj korisnika">'); ?> 
        <br>
        <br>
        <br>
        <?php echo anchor("Admin/postaviSrecnuPricu",'<input type="button" value="Postavi srećnu priču">'); ?>
        <br>
        <br>
        <br>
        <?php echo anchor("Admin/zalbe",'<input type="button" value="Žalbe">'); ?>
        <br>
        <br>
        <br>
        <?php echo anchor("Admin/postaviVest",'<input type="button" value="Postavi vest">'); ?>
    </div>
</div>
