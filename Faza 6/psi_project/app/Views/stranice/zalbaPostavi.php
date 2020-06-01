<!----Anja Pantović 0418/2017

Forma za postavljanje zalbe (korisnik)
@version 1.0
---->

<script>
        localStorage.setItem("pocetna",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",true);
        localStorage.setItem("administrator",false);
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
    #td1{
        color: black;
        font-family: 'Times New Roman';
        padding: 0px;
        font-size: medium;

        border: 1px solid black;
    }

</style>

<form name="zalbapforma" action="<?= site_url("Korisnik/zalbaSubmit") ?>" method="POST">
    <div class="row" style="padding-top: 1%; padding-bottom: 1%">
        <div class="offset-sm-3 col-sm-6" style="margin-top:50px">

            <textarea  placeholder="Unesite tekst do 1000 karaktera..." name='opis'  maxlength="1000" style="width:100%" rows="15" id="gradforma"></textarea> 
        </div>
        <div class="offset-sm-7 col-sm-2" style="margin-top:50px">
            <font color='red' style="font-size:15px;">
            <?php
            if (!empty($greske['zalba']))
                echo $greske['zalba'];
            ?></font>

            <input onclick='return confirm(" Da li ste sigurni da zelite da pošaljete žalbu? ");'  type="submit" style="border-radius: 10px; background:RGB(234,44,6); color:white; width: 100%" value="Pošalji žalbu">

        </div>
    </div>  
</form>




