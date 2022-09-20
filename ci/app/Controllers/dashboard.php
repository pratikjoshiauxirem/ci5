<?php

namespace App\Controllers;
use App\Models\UserModel;
class Dashboard extends BaseController
{
    public function index()
    {
    	$data= [];
        echo view('templates/header',$data);
        echo view('dashboard');
        echo view('templates/footer');
    }
    public function profile()
    {
        $model=new UserModel();
        $data=[];
       # $data=['user']=$model->where('id',session()->get('id'))->first();
        // helper(['form']);
        echo view('templates/header',$data);
        echo view('profile');
        echo view('templates/footer');
    }
}
