

<h1 style="text-align: center; margin-bottom: 2%; color: RGB(254,44,1);"> <i>O nama</i></h1>
<div class="row onama">
    <div class="col-sm-12" style="text-align: justify; font-size: 18px; font-family: sans-serif; font-weight: 500; color: red; background-color: rgba(148,69,69,0.04)">
        
        Svakim danom u svetu je sve više napuštenih životinja, a na društvenim mrežama se svakodnevno mogu videti objave izgubljenih ljubimaca, pri čemu je potrebno i po nekoliko dana da se vest proširi i stigne do svih ljudi. 
        <br>
        Ono što je naša želja jeste da preko ove platforme pomognemo svima da nadju svog četvoronogog prijatelja, bilo da se traži novi član porodice ili izgubljeni. Ono što ovaj sajt pruža sa jedne strane je usvajanje pasa i mačaka u skladu sa svim željama budućeg vlasnika, dok sa druge strane predstavlja idealno mesto za širenje informacija o izgubljenom ljubimcu. Pored ovoga, postoji i mogućnost da, ukoliko ste našli ljubimca za kog verujete da ima vlasnika, podelite to i tako mu pomognete da se vrati svojoj porodici.
        <br>
        Naš primarni cilj je smanjenje pasa i mačaka na ulicama, davanje šanse za lepši, bolji i kvalitetniji život i ljudima i ljubimcima, kao i podizanje svesti o ovom problemu o kom se danas nedovoljno priča, a može se svesti pod jedan slogan - "Udomi i spasi!".
        <br>
        Nadamo se da ćemo vašom podrškom uspeti to i da ostvarimo, a da ćemo mi vama, zauzvrat, promeniti život i ispuniti ga smehom i radošću.
        <br>
        <br>    
        <i>Vaš NotSoFantastic4</i>
    </div>

</div>
<style>
    tr:hover {
        background-color: rgba(148,69,69,0.08); 
    }
    td:hover{
        background-color: rgba(148,69,69,0.08);
        color: black;
          
    }
    .onama:hover{
       background-color: white;
    }
</style>

<script>
        localStorage.setItem("lf",false);
        localStorage.setItem("udomi",false);
        localStorage.setItem("srecneprice",false);
        localStorage.setItem("zalbe",false);
        localStorage.setItem("administraor",false);
        localStorage.setItem("pocetna",true);            
</script>

<h2 style="text-align: center !important; color: RGB(254,44,1); margin-top: 5%;"> <i>Vesti</i></h2>
<table class="table" style="margin-top: 2%; margin-bottom: 5%">
<?php
$putanja="'data:image/jpeg;base64,".base64_encode( $slike[8]->slika )."'";
$i=0;

$n=1;

foreach ($vesti as $vest) {
    if(($i % 2)==0){
        echo '<tr><td colspan="2" style="text-align:right"><i>Obriši vest ispod: </i>';
        echo anchor("$controller/brisiVest/{$vest->vestId}",'<img style=" width:30px" src='.$putanja.'>');
        echo '</td></tr><tr><td colspan="2" style="text-align:center;padding-top:25px; padding-bottom:10px; background-color: rgba(148,69,69,0.04); color:red; font-style:italic;"><h3>'.$vest->naslov. '</h3></td></tr><tr style="background-color: rgba(148,69,69,0.04)"><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $vest->slika ).'"/></td><td style="padding-left:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$vest->opis. '</td></tr>';
    }
    else{
        echo '<tr><td colspan="2" style="text-align:right"><i>Obriši vest ispod: </i>';
        echo anchor("$controller/brisiVest/{$vest->vestId}",'<img style="width:30px" src='.$putanja.'>');
        echo '</td></tr><tr><td colspan="2" style="text-align:center;padding-top:25px; padding-bottom:10px; background-color: rgba(148,69,69,0.04); color:red; font-style:italic;"><h3>'.$vest->naslov. '</h3></td></tr><tr style="background-color: rgba(148,69,69,0.04)"><td style="padding-right:1%; text-align: justify; font-size: 18px; font-weight: 400" >'.$vest->opis. '</td><td style="width:30%;"><img style="width:100%;" src="data:image/jpeg;base64,'.base64_encode( $vest->slika ).'"/></td></tr>';
    }
    $i=$i+1;
    
} 

?>

</table>