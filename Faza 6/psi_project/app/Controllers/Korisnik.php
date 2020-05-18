<?php namespace App\Controllers;
use App\Models\SlikeModel;
use \App\Models\VestiModel;
use App\Models\LFModel;
use App\Models\Oglasi;
use App\Models\UdomiModel;
use App\Models\ZalbeModel;
use App\Models\SrecnaModel;

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
	//--------------------------------------------------------------------
    public function udomi(){
        $udomiModel=new UdomiModel();
        $oglasi=$udomiModel->findAll();
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Udomi.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
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
            
            $this->prikaz('Views/stranice/Udomi.php', ['slike'=>$slike], ['oglasi'=>[]]);
        }
        else{
            $oglasi=$udomiModel->find($niz);
            $this->prikaz('Views/stranice/Udomi.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
        }
    }
    
    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
    
    
    //Jole Jelcic ------------------------------------------------------------------------
     
    public function postaviLF($greska=""){
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Lost&FoundPostavi.php', ['slike'=>$slike],['greska'=>$greska]);
    }
    
    
    public function lfSubmit() {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['myfile2']['tmp_name'])) {
                $imgData = file_get_contents($_FILES['myfile2']['tmp_name']);
                $imageProperties = getimageSize($_FILES['myfile2']['tmp_name']);
            }
        }
        
        if ($this->request->getVar('vrsta')=="" || $this->request->getVar('vrsta')==null){
            $greska="Polje vrsta ne sme da bude prazno!";
            return $this->postaviLF($greska);
        }
        
        $vrsta= strtolower($this->request->getVar('vrsta'));
        
        if ($vrsta!="pas" && $vrsta!="macka"){
            $greska="Molimo vas da vrsta bude napisana kao prilozeno!";
            return $this->postaviLF($greska);
        }
            
        if ($this->request->getVar('opis')=="" || $this->request->getVar('opis')==null) {
            $greska="Opis ne sme biti prazan!";
            return $this->postaviLF($greska);
        }
        $opis=$this->request->getVar('opis');
        
        $izgpro=0;
        if ($this->request->getVar('lfradio')=="pronadjen"){
            $izgpro=1;
        }
        
        $pol="";
        if ($this->request->getVar('pol')!=null){
            $pol=$this->request->getVar('pol');
        }
        
        if($pol!=""){
            if ($pol!="musko" && $pol!="zensko"){
                $greska="Molimo vas da vrsta bude napisana kao prilozeno!";
                return $this->postaviLF($greska);
            }
        }
        
        $rasa="";
        if ($this->request->getVar('rasa')!=null){
            $rasa=$this->request->getVar('rasa');
        }
        
        $user=$this->session->get('korisnik')->username;
        
        $db = \Config\Database::connect();
        $builder = $db->table('oglas');
        $builder->selectMax('oglasId');
        $query = $builder->get(); 
        
        if ($query->getResult()[0]->oglasId==null) $newId=0;
        else $newId=$query->getResult()[0]->oglasId+1;
        if (!isset($imgData)) $imgData=null;
        
        
        $oglasiModel=new Oglasi();
        $lfModel = new LFModel();
        
        $oglasiModel->insert([ 
            'oglasId'=>$newId,
            'vrsta'=>$vrsta,
            'pol'=>$pol,
            'rasa'=>$rasa,
            'slika'=>$imgData,
            'opis'=>$opis,
            'username'=>$user
        ]);
        $lfModel->insert([
            'izgpro'=>$izgpro,
            'oglasId'=>$newId
        ]);
        
        return redirect()->to(site_url("Korisnik/lf"));
    }


    public function zalbaPostavi() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/zalbaPostavi.php', ['slike'=>$slike],[]);
    }
    
    public function zalbaSubmit() {
        $db = \Config\Database::connect();
        $builder = $db->table('zalba');
        $builder->selectMax('zalbaId');
        $query = $builder->get(); 
        if ($query->getResult()[0]->zalbaId==null) $newId=0;
        else $newId=$query->getResult()[0]->zalbaId+1;
        
        $zalbaM=new ZalbeModel();
        $str=$this->request->getVar('opis');
        $zalbaM->insert([ 
            'zalbaId'=>$newId,
            'opis'=>$this->request->getVar('opis'),
            'username'=>$this->session->get('korisnik')->username
        ]);
        return redirect()->to(site_url("Korisnik/index"));
    }
    
    
    public function udomiPostavi($greska="") {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/udomiPostavi.php', ['slike'=>$slike],['greska'=>$greska]);
    }
    
    public function udomiSubmit() {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['myFile3']['tmp_name'])) {
                $imgData = file_get_contents($_FILES['myFile3']['tmp_name']);
                $imageProperties = getimageSize($_FILES['myFile3']['tmp_name']);
            }
        }
        
        if ($this->request->getVar('vrsta')=="" || $this->request->getVar('vrsta')==null){
            $greska="Polje vrsta ne sme da bude prazno!";
            return $this->udomiPostavi($greska);
        }
        
        $vrsta= strtolower($this->request->getVar('vrsta'));
        
        if ($vrsta!="pas" && $vrsta!="macka"){
            $greska="Molimo vas da vrsta bude napisana kao prilozeno!";
            return $this->udomiPostavi($greska);
        }
            
        if ($this->request->getVar('opis')=="" || $this->request->getVar('opis')==null) {
            $greska="Opis ne sme biti prazan!";
            return $this->udomiPostavi($greska);
        }
        $opis=$this->request->getVar('opis');
        
        $starost="";
        if ($this->request->getVar('starost')!=null){
            $starost=$this->request->getVar('starost');
        }
        
        $mesto="";
        if ($this->request->getVar('mesto')!=null){
            $mesto=$this->request->getVar('mesto');
        }
        
        $pol="";
        if ($this->request->getVar('pol')!=null){
            $pol=$this->request->getVar('pol');
        }
        
        if($pol!=""){
            if ($pol!="musko" && $pol!="zensko"){
                $greska="Molimo vas da vrsta bude napisana kao prilozeno!";
                return $this->udomiPostavi($greska);
            }
        }
        
        $rasa="";
        if ($this->request->getVar('rasa')!=null){
            $rasa=$this->request->getVar('rasa');
        }
        
        $user=$this->session->get('korisnik')->username;
        
        $db = \Config\Database::connect();
        $builder = $db->table('oglas');
        $builder->selectMax('oglasId');
        $query = $builder->get(); 
        
        if ($query->getResult()[0]->oglasId==null) $newId=0;
        else $newId=$query->getResult()[0]->oglasId+1;
        if (!isset($imgData)) $imgData=null;
        
        
        $oglasiModel=new Oglasi();
        $udomiModel = new UdomiModel();
        
        $oglasiModel->insert([ 
            'oglasId'=>$newId,
            'vrsta'=>$vrsta,
            'pol'=>$pol,
            'rasa'=>$rasa,
            'slika'=>$imgData,
            'opis'=>$opis,
            'username'=>$user
        ]);
        $udomiModel->insert([
            'starost'=>$starost,
            'mesto'=>$mesto,
            'oglasId'=>$newId
        ]);
        
        return redirect()->to(site_url("Korisnik/udomi"));
    }
    
    
    public function srecnePrice() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $priceModel=new SrecnaModel();
        $price=$priceModel->findAll();
        $this->prikaz('stranice/SrecnePriceAdmin.php',['slike'=>$slike],['price'=>$price]);
    }
}
