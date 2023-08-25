<?php

namespace App\Controllers;
use App\Models\DataModel;
use App\Models\userModel;

class Home extends BaseController
{
  private $db;
  private $userModel;
  private $dataModel;
    public function __construct() {
        $this->dataModel=new DataModel();
		$this->db = \Config\Database::connect();
        $this->userModel = new userModel($this->db);
		
	}

     
    public function index(): string
    {
        return view('welcome_message');
    }

    public function view()
    {
      
        $data['users'] = $this->dataModel->findAll();
        
        return view('display',$data);
    }
    
    public function del($id){
        $this->dataModel->DeleteData($id);
      
        return redirect()->to( base_url('/view') );
    }

    public function about()
    {
    
        return view('about');
    }

    public function edit($id)
    {
        $data=$this->dataModel->EditData($id);
        return view('/update',$data);
    }
    public function update(){
        
        $id	= $this->request->getPost('id');
        $name	= $this->request->getPost('name');
		$email	= $this->request->getPost('email');
		$password = $this->request->getPost('message');
        $data = [
			'name'	=> $name,
			'email'	=> $email,
			'password'	=> $password,
		];

       $this->dataModel->UpdateData($id,$data);
       $data1 = [
        'success' => true,
        'data' => 'success',
        'msg' => "Data Updated"
       ];
 
       return $this->response->setJSON($data1);




    }
    public function contact()
    {
       
        $name	= $this->request->getPost('name');
		$email	= $this->request->getPost('email');
		$password = $this->request->getPost('message');


        $data = [
			'name'	=> $name,
			'email'	=> $email,
			'password'	=> $password,
		];

        $this->userModel->add($data);

     
         $data1 = [
            'success' => true,
            'data' => 'success',
            'msg' => "Thanks for sign up. Try to Login"
           ];
     
           return $this->response->setJSON($data1);
        }

    }
    

