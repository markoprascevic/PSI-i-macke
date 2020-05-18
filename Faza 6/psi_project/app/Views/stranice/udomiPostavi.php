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
        padding-bottom: 25px !important;
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
    #td1{
        color: black;
        font-family: 'Times New Roman';
        padding: 0px;
        font-size: medium;

        border: 1px solid black;
    }

</style>

<form name="udomipforma" action="<?= site_url("Korisnik/udomiSubmit") ?>" method="POST" enctype="multipart/form-data">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
        <div class="offset-sm-1 col-sm-10" >
            <div style="text-align: center; color: red; font-size: 25px;"><?php echo urldecode($greska); ?></div>
            <table style="width: 100%; margin-top: 25px">

                <tr>
                    <td colspan="5">
                        <table>
                            <tr>
                                <td>
                                    Vrsta:* 
                                </td>
                                <td>
                                    <input type="text" name="vrsta" placeholder="pas/mačka" value="<?= set_value('vrsta') ?>">
                                    <font color='red' style="font-size:15px;">
                                    <?php
                                    if (!empty($greske['vrsta']))
                                        echo $greske['vrsta'];
                                    ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pol:
                                </td>
                                <td>
                                    <input type="text" name="pol" placeholder="mužijak/ženka">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Rasa:
                                </td>
                                <td>
                                    <input type="text" name="rasa" value="<?= set_value('rasa') ?>">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Slika:
                                </td>
                                <td>
                                    <input type="file" id='fileToUpload' name="myFile3" style=" padding-left: 20px; padding-right: 20px; border: 0px;">
                                  
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Starost: 
                                </td>
                                <td>
                                    <input type="number" name="starost" placeholder="izražena u godinama" value="<?= set_value('starost') ?>">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mesto: 
                                </td>
                                <td>
                                    <input type="text" name="mesto"  value="<?= set_value('mesto') ?>">

                                </td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="5">
                        <table>
                            <tr>
                                <td>
                                    Opis:*
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <textarea  placeholder="Unesite tekst do 1000 karaktera..." name='opis' maxlength="1000" cols="30" rows="8" id="gradforma"></textarea> 

                                    <font color='red' style="font-size:15px;">
                                    <?php
                                    if (!empty($greske['email']))
                                        echo $greske['email'];
                                    ?></font>
                                </td>
                            </tr>
                            <tr > 
                                <td colspan="10" style="text-align: right; padding-top: 50px; padding-right:10%;">
                                    <input type="submit" style="border-radius: 10px; background:RGB(234,44,6); color:white;" value="Postavi oglas">
                                </td>
                            </tr>
                        </table>
                    </td>  
                </tr>

            </table>
            
        </div>
    </div>  
</form>






