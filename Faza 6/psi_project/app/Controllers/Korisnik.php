<?php namespace App\Controllers;
use App\Models\SlikeModel;
use \App\Models\VestiModel;
class Korisnik extends BaseController
{
    protected function prikaz($page,$data, $data2){
        $data['controller']='Korisnik';
        echo view('sabloni/header_korisnik.php', $data);
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
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Lost&Found.php', ['slike'=>$slike], []);
    }

	//--------------------------------------------------------------------

}
