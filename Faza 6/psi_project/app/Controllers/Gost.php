<?php namespace App\Controllers;
use App\Models\SlikeModel;
use App\Models\VestiModel;
use App\Models\LFModel;

class Gost extends BaseController
{
     protected function prikaz($page,$data, $data2){
        $data['controller']='Gost';
        echo view('sabloni/header_gost.php', $data);
        echo view($page,$data2);
        echo view('sabloni/footer.php');
    }
    
    public function index(){
        $vestiModel=new VestiModel();
        $vesti=$vestiModel->findAll();
       
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Pocetna.php', ['slike'=>$slike],['vesti'=>$vesti]);
    }

    public function lf(){
        $lfModel=new LFModel();
        $oglasi=$lfModel->findAll();
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Lost&Found.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
    }
	//--------------------------------------------------------------------

}
