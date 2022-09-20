<?php

namespace App\Controllers;
use App\Models\UserModel;
class Users extends BaseController
{
    // Login Page
    public function index()
    {
               $data=[];
        helper(['form']);

        if($this->request->getmethod()=='get'){
            $rules = [
                'email' => 'min_length[6]',
                'password' =>'min_length[8]'];
                $errors = [
                    'password'=>[ 
                        'validateUser' => 'Email or password Dosent Match'
                    ]
                ];
                
            
    
         if(!$this->validate($rules,$errors)){
            $data['validation'] = $this->validator;
         } else{
            //store the user into database
            $model = new UserModel();
            $user=$model->where('email',$this->request->getVar('email'))->first();
            $user1=$model->where('password',$this->request->getVar('password'))->first();
            if($user==true && $user1==true){
           $this->setUserSession($user);
           return redirect()->to('dashboard');
            }
            else{
                session()->setFlashData('loginfail','Email and password dosent match');
            }
         }
        }
        echo view('templates/header',$data);
        echo view('login');
        echo view('templates/footer');
    }


     private function setUserSession($user){

        $data= [
            'id'=> $user['id'],
             'firstname'=> $user['firstname'],
              'lastname'=> $user['lastname'],
               'email'=> $user['email'],
               'isLoggedIn' => true
        ];
         session()->set($data);
         return true;
     }
      // New User Registraion
      public function register()
    {
        
        $data=[];
        helper(['form']);

        if($this->request->getmethod()=='post'){
        	$rules = [
        		'firstname'=>'min_length[3]',
        		'lastname'=>'min_length[3]',
        		'email' => 'min_length[6] |is_unique[users.email]',
        		'password' =>'min_length[8] '];
        		
            
    
         if(!$this->validate($rules)){
         	$data['validation'] = $this->validator ;
         } else{
         	//store the user into database
            $model = new UserModel();
            $newData=[
                'firstname'=>$this->request->getVar('firstname'),
                'lastname'=>$this->request->getVar('lastname')
             

            ];
            $model->save($newData);
            $session=session();
            $session->setFlashdata('success','successful Registration');
            return redirect()->to('/');
         }}
          helper(['form']);
        echo view('templates/header',$data);
        echo view('register');
        echo view('templates/footer');
    }
//   Profile Updation 
    public function profile()
    {
      
      
        $data=[];
        helper(['form']);

        if($this->request->getmethod()=='post'){
        	$rules = [
        		'firstname'=>'min_length[3]',
        		'lastname'=>'min_length[3]',
        		];
        		
         if($this->request->getPost('password') != ''){
            $rules['password']='required|min_length(8)';
         }
    
         if(!$this->validate($rules)){
         	$data['validation'] = $this->validator ;
         } else{
         	//store the user into database
            $model = new UserModel();
            $newData=[
                'id'=>session()->get('id'),
                'firstname'=>$this->request->getVar('firstname'),
                'lastname'=>$this->request->getVar('lastname')
            ];
            if($this->request->getPost('password') != ''){
                $newData['password']=$this->request->getPost('password');
             }
            $model->save($newData);
            $session =session();
            $session->setFlashdata('success','Profile Successfully Updated');
            return redirect()->to('/profile');
         }}
          helper(['form']);
          $model = new UserModel();
        $data['user']= $model->where('id',session()->get('id'))->first(); 
        echo view('templates/header',$data);
        echo view('profile');
        echo view('templates/footer');
    }
    //Logout
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
