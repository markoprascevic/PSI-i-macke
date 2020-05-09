<?php namespace App\Controllers;
use App\Models\SlikeModel;
use App\Models\VestiModel;
use App\Models\LFModel;
use App\Models\Oglasi;
use App\Models\UdomiModel;

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
    
    public function lfPretrazi(){
        $ip=$_GET['izgpro'];
        $v=$_GET['vrsta'];
        $r=$_GET['rasa'];
        $p=$_GET['pol'];
        
        if($ip=='izgubljen') $ip=0;
        else if($ip=='pronadjen') $ip=1;
        
        if($v=='vrsta') $v='%';
        if($p=='pol') $p='%';
        if($r=='') $r='%';
        
        
        $oglasiModel=new Oglasi();
        
        $array = ['pol' => $p, 'vrsta' => $v, 'rasa' => $r];
        $celiOglasi=$oglasiModel->like($array)->findAll();
        
        $niz=array();
        foreach ($celiOglasi as $oglasC) {
            array_push($niz, $oglasC->oglasId);
        } 
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        
        if(empty($niz)){
            
            $this->prikaz('Views/stranice/Lost&Found.php', ['slike'=>$slike], ['oglasi'=>[]]);
        }
        else{
            $lfModel=new LFModel();
            $oglasi=$lfModel->like('izgpro',$ip)->find($niz);
            $this->prikaz('Views/stranice/Lost&Found.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
        }
    }
    
    public function nemaPristupU() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/nemaPristupU.php', ['slike'=>$slike], []);
    }
    public function nemaPristupS() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/nemaPristupS.php', ['slike'=>$slike], []);
    }
    public function nemaPristupZ() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/nemaPristupZ.php', ['slike'=>$slike], []);
    }
    
}
