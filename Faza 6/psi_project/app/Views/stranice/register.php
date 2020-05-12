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

<form name="registerforma" action="<?= site_url("Gost/registerSubmit") ?>" method="POST">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
            <div class="offset-sm-1 col-sm-10" id="gradforma">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="4">
                            Registracija
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Ime i prezime:* 
                        </td>
                        <td>
                            <input type="text" name="imeiprezime" value="<?= set_value('imeiprezime') ?>">
                            <font color='red' style="font-size:15px;">
                                <?php if(!empty($greske['imeiprezime'])) 
                                   echo $greske['imeiprezime'];
                                ?></font>
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
                            <input type="text" name="korime" value="<?= set_value('korime') ?>">
                            <font color='red' style="font-size:15px;">
                            <?php if(!empty($greske['korime'])) 
                                echo $greske['korime'];
                            ?></font>
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
                            <input type="text" name="email" value="<?= set_value('email') ?>">
                            <font color='red' style="font-size:15px;">
                            <?php if(!empty($greske['email'])) 
                                echo $greske['email'];
                            ?></font>
                        </td>
                        <td>
                            Adresa:
                        </td>
                        <td>
                            <input type="text" name="adresa" value="<?= set_value('adresa') ?>">
                        </td>                       
                    </tr>
                    <tr>
                        <td colspan="2">
                        </td>
                        <td>
                            Telefon:
                        </td>
                        <td>
                            <input type="text" name="telefon" value="<?= set_value('telefon') ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center; padding-top: 50px">
                            <input type="submit" style="border-radius: 10px; background:RGB(234,44,6); color:white;" value="Registruj se">
                        </td>
                    </tr>
                </table>
                <?php if(isset($poruka)) echo "<div style='color:RGB(252,44,1); text-align: center; font-weight: bold; font-family:initial; font-size:22px;'>$poruka</div><br/>"; ?>
            </div>
    </div>  
</form>




