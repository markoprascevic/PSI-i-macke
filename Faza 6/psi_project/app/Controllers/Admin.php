<?php namespace App\Controllers;
use App\Models\SlikeModel;
use App\Models\VestiModel;

class Admin extends BaseController
{
    protected function prikaz($page,$data, $data2){
        $data['controller']='Admin';
        echo view('sabloni/header_admin.php', $data);
        echo view($page,$data2);
        echo view('sabloni/footer.php');
    }
    
    public function index(){
        $vestiModel=new VestiModel();
        $vesti=$vestiModel->findAll();
        
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/PocetnaAdmin.php', ['slike'=>$slike], ['slike'=>$slike, 'vesti'=>$vesti]);
    }
    
    public function lf(){
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        $this->prikaz('Views/stranice/Lost&FoundAdmin.php', ['slike'=>$slike], ['slike'=>$slike]);
    }
   
        
        //--------------------------------------------------------------------
    
    
    public function brisiVest($id){
        $vestiModel=new VestiModel();
        $vestiModel->delete($id);
        $vesti=$vestiModel->findAll();
        $slikaModel=new SlikeModel();
        $slike=$slikaModel->findAll();
        
        $this->prikaz('Views/stranice/PocetnaAdmin.php', ['slike'=>$slike], ['slike'=>$slike, 'vesti'=>$vesti]);
     }
}
