<html>
    <head>
        <title>PSI i macke</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                if(localStorage.getItem("pocetna")=="true"){
                   $('.button1').css('background-color','white');
                   $('.button1').css('color', 'black');
                }
                if(localStorage.getItem("lf")=="true"){
                   $('.button2').css('background-color','white');
                   $('.button2').css('color', 'black');
                }
                if(localStorage.getItem("udomi")=="true"){
                   $('.button3').css('background-color','white');
                   $('.button3').css('color', 'black');
                }

                if(localStorage.getItem("srecneprice")=="true"){
                   $('.button4').css('background-color','white');
                   $('.button4').css('color', 'black');
                }
                if(localStorage.getItem("zalbe")=="true"){
                   $('.button5').css('background-color','white');
                   $('.button5').css('color', 'black');
                }
                if(localStorage.getItem("Administrator")=="true"){
                   $('.button6').css('background-color','white');
                   $('.button6').css('color', 'black');
                }
                $('.buttoni').click(function(){  
                    $('.buttoni').each(function(){
                        $(this).css("background-color:", "black");   
                    });
                   $(this).css('background-color','white');
                   $(this).css('color', 'black');
                   
                });
            });
            
        </script>
    </head>
    <?php
                $putanja="'data:image/jpeg;base64,".base64_encode( $slike[2]->slika )."'";
                echo '<body style="background-image: url('.$putanja.');  background-attachment: fixed;" >'
    ?>
        <style>
        #grad {
            background: RGB(254,44,1); /* For browsers that do not support
            gradients */
            background: -webkit-linear-gradient(left, white,RGB(254,44,1)); /*
            For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(left, white,RGB(254,44,1)); /* For
            Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(left, white,RGB(254,44,1)); /*
            For Firefox 3.6 to 15 */
            background: linear-gradient(to right,white,RGB(254,44,1)); /*
            Standard syntax */
            height: 85px;
        }    
        footer{
            background: white;
            position: fixed;
            top: 97.5%;
            left:0;
            right:0;
            width: 100%;
            z-index: 20;
        }
        header{ 
            min-height: 100px;
            position: fixed;
            left:0;
            right:0;
            width: 100%;
            z-index: 20;
        }
        </style>
        
        <header>
                <div class="row" id="grad">    
                    <div class="col-sm-1" style="text-align:center">
                        <?php echo '<a href="index"><img style="width:130px; " src="data:image/jpeg;base64,'.base64_encode( $slike[7]->slika ).'"/></a>';?>
                    </div>

                    <div class="offset-sm-2 col-sm-9">

                        <div class="row">
                            <div class="col-sm-10" style="margin:0px; margin-top:35px !important; padding: 0px;">
                                <?php echo anchor("$controller/index",'<button style=" font-size:23px; height: 50px; width: 190px; border: solid red 2px; background-color: RGB(254,44,1);" type="button" name="Pocetna" class="btn btn-danger button1 buttoni">Početna</button>'); ?>
                                <?php echo anchor("$controller/lf",'<button style=" font-size:23px; height: 50px; width: 190px; border: solid red 2px; background-color: RGB(254,44,1);" type="button" name="Lost&Found" class="btn btn-danger button2 buttoni">Lost&Found</button>'); ?>
                                <?php echo anchor("$controller/udomi",'<button style=" font-size:23px; height: 50px; width: 190px; border: solid red 2px; background-color: RGB(254,44,1);" type="button" name="Udomi" class="btn btn-danger button3 buttoni">Udomi</button>'); ?>
                                <?php echo anchor("$controller/index",'<button style=" font-size:23px; height: 50px; width: 190px; border: solid red 2px; background-color: RGB(254,44,1);" type="button" name="SrecnePrice" class="btn btn-danger button4 buttoni">SrecnePrice</button>'); ?>
                                <?php echo anchor("$controller/index",'<button style=" font-size:23px; height: 50px; width: 190px; border: solid red 2px; background-color: RGB(254,44,1);" type="button" name="Zalbe" class="btn btn-danger button5 buttoni">Zalbe</button>'); ?>
                                <?php echo anchor("$controller/index",'<button style=" font-size:23px; height: 50px; width: 190px; border: solid red 2px; background-color: RGB(254,44,1);" type="button" name="Administrator" class="btn btn-danger button6 buttoni">Administrator</button>'); ?>
                                
                            </div>
                            <div class="col-sm-1" style="margin-top: 20px; text-align: right">
                                <?php echo '<a href="#"><img style="width:40px; " src="data:image/jpeg;base64,'.base64_encode( $slike[5]->slika ).'"/></a>';?>
                            </div>
                            <div class="col-sm-1" style="margin-top: 20px;">
                                <?php echo '<a href="#"><img style="width:40px; " src="data:image/jpeg;base64,'.base64_encode( $slike[6]->slika ).'"/></a>';?>
                            </div>
                        </div> 
                    </div>
                </div>    
        </header>
    
        <br>
        <div class="container" style="margin-top: 100px">
        
        
        
          
        

