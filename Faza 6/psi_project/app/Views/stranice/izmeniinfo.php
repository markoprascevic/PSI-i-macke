<script>
        localStorage.setItem("lf",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administraor",false);
        localStorage.setItem("pocetna",false);       
        localStorage.setItem("administrator",false);
</script>

<style>
        th {
            color: RGB(252,44,1);
            text-align: center;
            font-family: cursive;
            font-size: 30px;
            padding: 30px;
        }
        td {
            color: RGB(252,44,1);
            font-family: cursive;
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 18px;
        }
        
        input {
            border-radius: 10px;
            border: 2px solid RGB(252,42,0);
            color: black;
        }
        
        a {
            color: RGB(252,44,1); 
            font-style: italic;
        }
        
        a:hover {
            color: RGB(252,44,1); 
            font-style: italic;
        }
        
</style>

<form name="izmeniforma" action="izmeniSubmit" method="POST">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
            <div class="offset-sm-1 col-sm-10">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            Ime i prezime:* 
                        </td>
                        <td>
                            <?php 
                                echo $korisnik->imeiprezime;
                            ?>
                        </td>
                        <td>
                            Lozinka:*
                        </td>
                        <td>
                            <input type="password" name="lozinka">
                            <font color='red' style="font-size:15px;">
                                <?php if(!empty($greske['lozinka'])) 
                                   echo $greske['lozinka'];
                                ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Korisničko ime:*
                        </td>
                        <td>
                            <?php 
                                echo $korisnik->username;
                            ?>
                        </td>
                        <td>
                            Ponovljena lozinka:*
                        </td>
                        <td>
                            <input type="password" name="ponloz">
                            <font color='red' style="font-size:15px;">
                            <?php if(!empty($greske['ponloz'])) 
                                echo $greske['ponloz'];
                            ?></font>
                        </td>                       
                    </tr>
                    <tr>
                        <td>
                            E-mail:*
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo set_value('email', $korisnik->email) ?>">
                            <font color='red' style="font-size:15px;">
                            <?php if(!empty($greske['email'])) 
                                echo $greske['email'];
                            ?></font>
                        </td>
                        <td>
                            Adresa:
                        </td>
                        <td>
                            <input type="text" name="adresa" value="<?php if ($korisnik->adresa!=null) echo set_value('adresa',$korisnik->adresa) ?>">
                        </td>                       
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td>
                            Telefon:
                        </td>
                        <td>
                            <input type="text" name="telefon" value="<?php if ($korisnik->telefon!=null) echo  set_value('telefon',$korisnik->telefon) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right;  padding-top: 50px">
                            Stara lozinka:
                        </td>
                        <td colspan="2" style="text-align: left; padding-top: 50px">
                            <input type="password" name="novaloz">
                            <font color='red' style="font-size:15px;">
                            <?php if(!empty($greske['novaloz'])) 
                                echo $greske['novaloz'];
                            ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center;">
                            <input onclick='return confirm("Da li ste sigurni da zelite da izmenite informacije?");'  type="submit" style="border-radius: 10px; background:RGB(234,44,6); color:white;" value="Potvrdi">
                        </td>
                    </tr>
                </table>
                <?php echo "<div style='color:RGB(252,44,1); text-align: center; font-weight: bold; font-family:initial; font-size:22px;'>Ako nova lozinka nije uneta stara se nece promeniti</div><br/>"; ?>
            </div>
    </div>  
</form>
