<?php namespace App\Controllers;
use App\Models\SlikeModel;
use App\Models\VestiModel;
use App\Models\LFModel;
use App\Models\Oglasi;
use App\Models\UdomiModel;
use App\Models\KorisnikModel;

/*Marko Praščević 0108/2017
      Anja Pantović 0418/2017

Controller za gosta
@version 1.0
*/

class Gost extends BaseController
{
/* @ret void
 * @param $page stranica za prikaz, $data podaci koji se koristi na html stranici, $data2 podaci za header
 * Koristi se za prikaz html stranica
 * 
 */
     protected function prikaz($page,$data, $data2){
        $data['controller']='Gost';
        echo view('sabloni/header_gost.php', $data);
        echo view($page,$data2);
        echo view('sabloni/footer.php');
    }
/*
 * prikaz pocetne stranice za gosta
 */    
    public function index(){
        $vestiModel=new VestiModel();
        $vesti=$vestiModel->findAll();
       
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Pocetna.php', ['slike'=>$slike],['vesti'=>$vesti]);
    }
/*
 * prikaz stranice sa lf oglasima
 */    
    public function lf(){
        $lfModel=new LFModel();
        $oglasi=$lfModel->findAll();
        
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Lost&FoundGost.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
    }
	//--------------------------------------------------------------------
/*
 * pretraga lf oglasa prema podacima unetim sa forme
 */        
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
            
            $this->prikaz('Views/stranice/Lost&FoundGost.php', ['slike'=>$slike], ['oglasi'=>[]]);
        }
        else{
            $lfModel=new LFModel();
            $oglasi=$lfModel->like('izgpro',$ip)->find($niz);
            $this->prikaz('Views/stranice/Lost&FoundGost.php', ['slike'=>$slike], ['oglasi'=>$oglasi]);
        }
    }
/*
 * prikaz stranice "nema pristupa"
 */        
    public function nemaPristupU() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/nemaPristupU.php', ['slike'=>$slike], []);
    }
    
    public function nemaPristupPostaviLF() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/nemaPristupPostaviLF.php', ['slike'=>$slike], []);
    }
/*
 * prikaz stranice "nema pristupa"
 */       
    public function nemaPristupS() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/nemaPristupS.php', ['slike'=>$slike], []);
    }
/*
 * prikaz stranice "nema pristupa"
 */       
    public function nemaPristupZ() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/nemaPristupZ.php', ['slike'=>$slike], []);
    }
/*
 * prikaz forme za logovanje gosta
 */          
    public function login($poruka=null) {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz("stranice/login", ['slike'=>$slike], ['poruka'=>$poruka]);
    }
/*
 * logovanje na servis ako postoji nalog sa zadatim podacima
 */           
    public function loginSubmit() {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        
        $korisnikModel=new KorisnikModel();
        $korisnik=$korisnikModel->find($this->request->getVar('korime'));
        if ($korisnik==null){ 
            $korisnik=$korisnikModel->findByEmail($this->request->getVar ('korime'));
            if ($korisnik!=null) $korisnik=$korisnik[0];
        }
        if($korisnik==null || $korisnik->password!=$this->request->getVar('lozinka'))
            return $this->login('Korisničko ime ili lozinka su neispravni!');
        
        $this->session->set('korisnik', $korisnik);
        if ($korisnik->admin==1) $this->session->set('admin', true);
        if ($korisnik->admin==0) {
            return redirect()->to(site_url('Korisnik'));
        }
        else {
            return redirect()->to(site_url('Admin'));
        }
    }
/*
 * prikaz stranice sa formom za registraciju
 */           
    public function register($greske=[]) {
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz("stranice/register", ['slike'=>$slike], ['greske'=>$greske]);
    }
/*
 * registrovanje korisnika i dodavanje u bazu
 */           
    public function registerSubmit() {
        
        $imeiprezime=$this->request->getVar('imeiprezime');
        $korime=$this->request->getVar('korime');
        $lozinka=$this->request->getVar('lozinka');
        $ponloz=$this->request->getVar('ponloz');
        $email=$this->request->getVar('email');
        $telefon=$this->request->getVar('telefon');
        $adresa=$this->request->getVar('adresa');
        
        if (strlen($imeiprezime)>20) 
            $greske['imeiprezime']='<br/>Ime i prezime mora da sadrži najviše 20 slova';
        if (strlen($imeiprezime)==0) 
            $greske['imeiprezime']='<br/>Unesite ime i prezime';
        if (strpos($imeiprezime," ")==false) 
            $greske['imeiprezime']='<br/>Unesite i ime i prezime';
        if (strlen($korime)>20) 
            $greske['korime']='<br/>Korisničko ime sme da sadrži najviže 20 slova';
        if (strlen($korime)==0) 
            $greske['korime']='<br/>Unesite korisničko ime';
        if (strlen($lozinka)<8)
            $greske['lozinka']='<br/>Lozinka mora da sadrži barem 8 slova';
        if (strlen($lozinka)>20)
            $greske['lozinka']='<br/>Lozinka sme da sadrži najviše 20 slova';
        if (strlen($ponloz)<8)
            $greske['ponloz']='<br/>Lozinka mora da sadrži barem 8 slova';
        if (strlen($ponloz)>20)
            $greske['ponloz']='<br/>Lozinka sme da sadrži najviše 20 slova';
        if (strlen($email)>40)
            $greske['email']='<br/>Email mora da sadrži najviše 40 slova';
        if (strpos($email,"@")==false || strpos($email,"@")==0 || strpos($email,"@")==strlen($email)-1)
            $greske['email']='<br/>Email nije u dobrom formatu';
        if (strlen($email)==0) 
            $greske['email']='<br/>Unesite email';
        
        if (isset($greske)) return $this->register($greske);
        
        $korisnikModel=new KorisnikModel();
        $korisnik=$korisnikModel->find($korime);
        if($korisnik!=null)
            $greske['korime']='<br/>Postoji korisnik sa ovim korisničkim imenom';
        $korisnik=$korisnikModel->findByEmail($email);
        if($korisnik!=null)
            $greske['email']='<br/>Postoji profil sa ovim mejlom';
        if($lozinka!=$ponloz)
            $greske['ponloz']='<br/>Lozinka i ponovljena lozinka se ne poklapaju';
        
        if (isset($greske)) return $this->register($greske);
        if ($telefon=="") $telefon=null;
        if ($adresa=="") $adresa=null;
        $korisnikModel=new KorisnikModel();
        $korisnikModel->insert([
            'imeiprezime'=>$imeiprezime,
            'password'=>$lozinka,
            'username'=>$korime,
            'telefon'=>$this->request->getVar('telefon'),
            'email'=>$email,
            'adresa'=>$this->request->getVar('adresa'),
            'admin'=>0
        ]);
        return redirect()->to(site_url("Gost/login"));
    }
    
}
