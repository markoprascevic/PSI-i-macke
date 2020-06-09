<!----Marko Praščević 0108/2017

Stranica "nema pristupa" (za gosta)
@version 1.0
---->

<script>
        localStorage.setItem("lf",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",true);
        localStorage.setItem("administraor",false);
        localStorage.setItem("pocetna",false);            
</script>



<h1 style="color:red; text-align: center; padding-top: 100px">Kako biste pristupili ovoj stranici potrebno je da se prijavite preko svog naloga!</h1>

<div class="row">
    <div class="col-sm-12" style="margin-top: 30%; color: red">
        <h4 style="text-align: center;">Ukoliko nemate nalog, stranici za registraciju mozete pristupiti klikom na dugme ispod.</h4>
    </div>
</div>
<div>
    <div class="col-sm-12" style="text-align:center">
        <?php echo anchor("gost/register",'<img style="width:130px; " src="data:image/jpeg;base64,'.base64_encode( $slike[10]->slika ).'">');?>
    </div>
</div>