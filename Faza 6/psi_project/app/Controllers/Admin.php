<?php namespace App\Controllers;
use App\Models\SlikeModel;
use App\Models\VestiModel;
use App\Models\LFModel;
use App\Models\Oglasi;
use App\Models\UdomiModel;

class Admin extends BaseController
{
    protected function prikaz($page,$data, $data2){
        $data['controller']='Admin';
        echo view('sabloni/header_admin.php', $data);
        
        echo view($page,$data2);
        return view('sabloni/footer.php');
    }
    
    public function index(){
        $vestiModel=new VestiModel();
        $vesti=$vestiModel->findAll();
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/PocetnaAdmin.php', ['slike'=>$slike], ['slike'=>$slike, 'vesti'=>$vesti]);
    }
    
    public function lf(){
        $lfModel=new LFModel();
        $oglasi=$lfModel->findAll();
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Lost&FoundAdmin.php', ['slike'=>$slike], ['slike'=>$slike, 'oglasi'=>$oglasi]);
    }
	//--------------------------------------------------------------------
    
    public function lfPretrazi(){
        $ip=$this->request->getVar('izgpro');
        $v=$this->request->getVar('vrsta');
        $r=$this->request->getVar('rasa');
        $p=$this->request->getVar('pol');
        
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
            
            $this->prikaz('Views/stranice/Lost&FoundAdmin.php', ['slike'=>$slike], ['oglasi'=>[]]);
        }
        else{
            $lfModel=new LFModel();
            $oglasi=$lfModel->like('izgpro',$ip)->find($niz);
            $this->prikaz('Views/stranice/Lost&FoundAdmin.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
        }
    }
        
        //--------------------------------------------------------------------
    
    
    public function brisiVest($id){
        $vestiModel=new VestiModel();
        $vestiModel->delete($id);
        $vesti=$vestiModel->findAll();
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        
        return redirect()->to(site_url("Admin/index"));
    }
    
    public function brisiOglas($id){        
        $lfModel=new LFModel();
        $lfModel->delete($id);
        $oglasM=new Oglasi();
        $oglasM->delete($id);
        $oglasi=$lfModel->findAll();
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        return redirect()->to(site_url("Admin/lf"));
    }
    
    
    //-------------------------------------------------------------------------------
    public function udomi(){
        $udomiModel=new UdomiModel();
        $oglasi=$udomiModel->findAll();
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/UdomiAdmin.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
    }
    
    
    public function udomiPretrazi() {
        $od=$_GET['starostOd'];
        $do=$_GET['starostDo'];
        $v=$_GET['vrsta'];
        $r=$_GET['rasa'];
        $p=$_GET['pol'];
        
        if($od=='') $od=0;
        if($do=='') $do=20;
        if($v=='vrsta') $v='%';
        if($p=='pol') $p='%';
        if($r=='') $r='%';
        
        //echo $v." ".$r; 
        $oglasiModel=new Oglasi();
        $udomiModel=new UdomiModel();
        
        $array = ['pol' => $p, 'vrsta' => $v, 'rasa' => $r];
        $celiOglasi=$oglasiModel->like($array)->findAll();
        
        $niz=array();
        
        foreach ($celiOglasi as $oglasC) {
            $og=$udomiModel->find($oglasC->oglasId);
            
            if($og!=null && $og->starost!='' && ((int)$og->starost >= (int)$od && (int)$og->starost <= (int)$do)){
                array_push($niz, $oglasC->oglasId);
            }
        } 
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        
        if(empty($niz)){
            
            $this->prikaz('Views/stranice/UdomiAdmin.php', ['slike'=>$slike], ['oglasi'=>[]]);
        }
        else{
            $oglasi=$udomiModel->find($niz);
            //var_dump($oglasi);
            $this->prikaz('Views/stranice/UdomiAdmin.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
        }
    }
    
    public function brisiUdomi($id) {
        $udomiModel=new UdomiModel();
        $udomiModel->delete($id);
        $oglasM=new Oglasi();
        $oglasM->delete($id);
        $oglasi=$udomiModel->findAll();
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        
        return redirect()->to(site_url("Admin/udomi"));
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
}
