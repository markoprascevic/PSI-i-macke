<!----Lazar Smiljković 0125/2017

Forma za logovanje na server 
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
        #gradforma {
            background: RGB(254,44,1); /* For browsers that do not support
            gradients */
            background: -webkit-linear-gradient(left, white, RGBA(251,216,211,0.5)); /*
            For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(left, white, RGB(251,216,211)); /* For
            Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(left, white, RGB(251,216,211)); /*
            For Firefox 3.6 to 15 */
            background: linear-gradient(to bottom, RGBA(255,255,255,0.5), RGBA(251,216,211,0.9), RGBA(255,255,255,0.5)); /*
            Standard syntax */
        }  
        th {
            color: RGB(252,44,1);
            text-align: center;
            font-family: cursive;
            font-size: 30px;
            padding: 30px;
        }
        td {
            color: RGB(252,44,1);
            text-align: left;
            font-family: cursive;
            padding: 10px;
            font-size: 18px;
        }
        
        input {
            border-radius: 10px;
            border: 2px solid RGB(252,42,0);
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

<form name="loginforma" action="<?= site_url("Gost/loginSubmit") ?>" method="POST">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
            <div class="offset-sm-3 col-sm-6" id="gradforma">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="2">
                            Login
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Korisničko ime/e-mail:
                        </td>
                        <td>
                            <input type="text" name="korime" value="<?= set_value('korime') ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lozinka:
                        </td>
                        <td>
                            <input type="password" name="lozinka">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" style="border-radius: 10px; background:RGB(234,44,6); color:white;" value="Login">
                        </td>
                    </tr>
                </table>
                <br />
                <br />
                <div style="text-align: center; padding-bottom: 60px;">
                    <?php echo anchor("Gost/register", "Nemate nalog? Klikom ovde kreirajte jedan."); ?>
                    <br />
                </div>
                <?php if(isset($poruka)) echo "<div style='color:RGB(252,44,1); text-align: center; font-weight: bold; font-family:initial; font-size:22px;'>$poruka</div><br/>"; ?>
            </div>
    </div>  
</form>


