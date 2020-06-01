<!----Anja Pantović 0418/2017

Prikaz profila korisnika
@version 1.0
---->

<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administraor",false);
        localStorage.setItem("lf",false);            
</script>

<style>
    td {
        color: RGB(252,44,1);
        width: 200px;
        padding: 10px;
        font-size: 20px;
    }
    td.td2 {
        text-align: center;
        font-family: cursive;
    }
    a {
        color: RGB(252,44,1);
        font-size: 16px;
    }
    a:hover {
        color: RGB(252,44,1);
        font-size: 16px;
    }
</style>

<div class="row" style="font-style: italic; font-family: cursive; color: RGB(252,44,1); font-size: 25px; padding-top: 20px;">
    <div class="offset-sm-1 col-sm-6">
        <u>Informacije o profilu</u>
        <table style="margin-top: 20px;">
            <tr>
                <td>Ime i prezime:</td>
                <td> <?php echo $korisnik->imeiprezime; ?> </td>
            </tr>
            <tr>
                <td>Korisničko ime:</td>
                <td> <?php echo $korisnik->username; ?> </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td> <?php  echo $korisnik->email; ?> </td>
            </tr>
            <tr>
                <td>Adresa:</td>
                <td> <?php if ($korisnik->adresa==null) echo "Nije unesena";
                    else echo $korisnik->adresa; ?> </td>
            </tr>
            <tr>
                <td>Telefon:</td>
                <td> <?php if ($korisnik->telefon==null) echo "Nije unesen";
                    else echo $korisnik->telefon; ?> </td>
            </tr>
        </table>
        <div style="text-align:center; margin-top: 40px;">
            <?php echo anchor("$controller/izmeniInfo",'<input style="border-radius: 5px; font-size:15px; font-family:arial; border: 1px solid black;" type="button" value="Izmenite informacije">'); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <u>Poslednje dodati oglasi</u>
        <table style='margin-top:5%;'>
            <?php 
                if ($oglasi==null) $duzina=0;
                else $duzina=(sizeof($oglasi)>2?2:sizeof($oglasi));
                for ($i=0; $i<$duzina; $i++) {
                    echo "<tr><td class='td2'>"."<img style='width:100%;' src='data:image/jpeg;base64,".base64_encode($oglasi[sizeof($oglasi)-$i-1]->slika)."'>"."<td/></tr><tr><td class='td2'>Oglas".($i+1)."<td/></tr>";    
                    if ($i==0);
                }
                for ($i=$duzina; $i<2; $i++) {
                    echo "<tr><td class='td2'>"."<img style='width:30%;' src='data:image/jpeg;base64,".base64_encode($slike[11]->slika)."'>"."<td/></tr><tr><td class='td2'>Oglas".($i+1)."<td/></tr>";    
                }
                echo "<tr><td class='td2'><a href='mojiOglasi'><b>Vidi sve>></b></a></td></tr>"
            ?>
        </table>
    </div>   
</div>