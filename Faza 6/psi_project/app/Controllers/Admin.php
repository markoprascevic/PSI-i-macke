<?php namespace App\Controllers;
use App\Models\SlikeModel;
use App\Models\VestiModel;
use App\Models\LFModel;
use App\Models\Oglasi;
use App\Models\UdomiModel;
use App\Models\KorisnikModel;
use App\Models\SrecnaModel;
use App\Models\ZalbeModel;

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
    
    public function administrator() {    
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('stranice/Administrator.php', ['slike'=>$slike], []);
    }
    
    public function izbrisiOglas() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $oglasiModel=new Oglasi();
        $oglasi=$oglasiModel->findAll();
        $this->prikaz('Views/stranice/obrisiOglas.php', ['slike'=>$slike], ['oglasi'=>$oglasi, 'greska'=>""]);
    }
    
    public function pretraziOglas() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        
        if ($this->request->getVar('id')==null && $this->request->getVar('korime')==null)
                return redirect()->to(site_url("Admin/izbrisiOglas"));
        else { 
            $oglasiModel=new Oglasi();
            if ($this->request->getVar('id')!=null) {
                $oglas=$oglasiModel->find($this->request->getVar('id'));
                if ($oglas!=null){
                    $this->prikaz('stranice/obrisiOglas.php', ['slike'=>$slike], ['oglasi'=>[$oglas], 'greska'=>""]);
                }
                else {
                    $this->prikaz('stranice/obrisiOglas.php', ['slike'=>$slike], ['oglasi'=>[], 'greska'=>"Ne postoji oglas sa zadatim ID-om."]);
                }
            }
            else {
               $oglasi=$oglasiModel->findByUsername($this->request->getVar('korime'));
               if ($oglasi==null) {
                   $this->prikaz('stranice/obrisiOglas.php', ['slike'=>$slike], ['oglasi'=>[], 'greska'=>"Zadati korisnik nema oglasa."]);
               }
               else {
                   $this->prikaz('stranice/obrisiOglas.php', ['slike'=>$slike], ['oglasi'=>$oglasi, 'greska'=>""]);
               }
            }
        }
    }
    
    public function brisanje($id) {
        $udomiModel=new UdomiModel();
        $udomiModel->delete($id);
        $lfModel=new LFModel();
        $lfModel->delete($id);
        $oglasM=new Oglasi();
        $oglasM->delete($id);       
        return redirect()->to(site_url("Admin/izbrisiOglas"));
    }
    
    public function blokiraj($username) {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $korisnikModel=new KorisnikModel();
        $korisnik=$korisnikModel->find($username);
        $korisnici=$korisnikModel->findAll();
        
        if ($korisnik->admin!=1) {
            $korisnikModel->delete($username);
            $greska="Korisnik uspešno blokiran";
            return redirect()->to(site_url("Admin/pretraziKorisnika/{$greska}"));
        }
        else {
            $greska='Korisnik je admin - blokiranje onemogućeno.';  
            return redirect()->to(site_url("Admin/pretraziKorisnika/{$greska}"));
        }
        
    }
    
    
    public function pretraziKorisnika($greska="") {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $korisnikModel=new KorisnikModel();
        $korisnici=$korisnikModel->findAll();
        if ($this->request->getVar('korime')=="") {
            if (urldecode($greska) == "Prvi mi je put") {
                $greska = "";
            } else if ($greska=="" || $greska=="pretraziKorisnika"){
                $greska = "Unesite korisničko ime";
            }
            $this->prikaz('stranice/blokirajKorisnika.php', ['slike'=>$slike], ['korisnici'=>$korisnici, 'greska'=>$greska]);
        }
        else { 
            $korisnik=$korisnikModel->find($this->request->getVar('korime'));          
            if ($korisnik==null) $this->prikaz('stranice/blokirajKorisnika.php', ['slike'=>$slike], ['korisnici'=>$korisnici, 'greska'=>"Ne postoji korisnik sa datim korisničkim imenom."]);
            else $this->prikaz('stranice/blokirajKorisnika.php', ['slike'=>$slike], ['korisnici'=>[$korisnik], 'greska'=>"Korisnik pronadjen"]);         
        }
    }
    
    public function postaviSrecnuPricu($greska="") {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('stranice/postaviSrecnuPricu.php',['slike'=>$slike],['greska'=>$greska]);
    }
    
    public function srecnaPricaSubmit() {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
                $imgData = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
                $imageProperties = getimageSize($_FILES['myfile']['tmp_name']);
            }
        }
        if ($this->request->getVar('opis')=="" || $this->request->getVar('opis')==null) {
            $greska="Opis ne sme biti prazan";
            return $this->postaviSrecnuPricu($greska);
        }
        $db = \Config\Database::connect();
        $builder = $db->table('srecnaprica');
        $builder->selectMax('srecnapricaId');
        $query = $builder->get(); 
        if ($query->getResult()[0]->srecnapricaId==null) $newId=0;
        else $newId=$query->getResult()[0]->srecnapricaId+1;
        if (!isset($imgData)) $imgData=null;

        $srecnaModel=new SrecnaModel();
        $srecnaModel->insert([ 
            'srecnapricaId'=>$newId,
            'opis'=>$this->request->getVar('opis'),
            'slika'=>$imgData
        ]);
        return redirect()->to(site_url("Admin/srecneprice"));
    }
    
    public function postaviVest($greska="") {
        $slikeModel=new SlikeModel();
        $slike=$slikeModel->findAll();
        $this->prikaz("stranice/postaviVest.php",['slike'=>$slike],['greska'=>$greska]);
    }
    
    public function vestSubmit() {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
                $imgData = file_get_contents($_FILES['myfile']['tmp_name']);
                $imageProperties = getimageSize($_FILES['myfile']['tmp_name']);
            }
        }
        if ($this->request->getVar('opis')=="" || $this->request->getVar('opis')==null) {
            $greska="Opis ne sme biti prazan";
            return $this->postaviVest($greska);
        }
        $db = \Config\Database::connect();
        $builder = $db->table('vest');
        $builder->selectMax('vestId');
        $query = $builder->get();      
        if ($query->getResult()[0]->vestId==null) $newId=0;
        else $newId=$query->getResult()[0]->vestId+1;  
        if (!isset($imgData)) $imgData=null;

        $vestModel=new VestiModel();               
        $vestModel->insert([ 
            'vestId'=>$newId,
            'naslov'=>$this->request->getVar('naslov'),
            'opis'=>$this->request->getVar('opis'),
            'slika'=>$imgData
        ]);
        return redirect()->to(site_url("Admin/index"));
    }
    
    public function zalbe($zalbe=null, $greska="") {
        $slikeModel=new SlikeModel();
        $slike=$slikeModel->findAll();
        if ($zalbe==null) {
            $zalbeModel=new ZalbeModel();
            $zalbe=$zalbeModel->findAll();
        }
        $this->prikaz("stranice/zalbe",['slike'=>$slike],['zalbe'=>$zalbe, 'greska'=>$greska]);
    }
    
    public function zalbePretrazi() {
        $slikeModel=new SlikeModel();
        $slike=$slikeModel->findAll();
        $greska="";
        if ($this->request->getVar('korime')=="") {
            return $this->zalbe(null, "Unesite korisničko ime");
        }
        else {
            $zalbeModel=new ZalbeModel();
            $zalba=$zalbeModel->findByUsername($this->request->getVar('korime'));
            $greska="";
            if ($zalba==null) $greska="Ne postoje žalbe za datog korisnika";
            return $this->zalbe($zalba, $greska);
        }
    }
    
    public function brisiZalbu($id) {
        $zalbeModel = new ZalbeModel();
        $zalbeModel->delete($id);
        return redirect()->to(site_url("Admin/zalbe"));
    }
}