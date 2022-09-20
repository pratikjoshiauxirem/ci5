<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model{
	protected $table= 'users';
	protected $allowedFields=['firstname','lastname','email','password','updated_at'];
	protected $beforeInsert =['beforeInsert'];
	// protected $beforeUpdate =['beoforeUpdate'];

	protected function beforeInsert(array $data)  {
        $data=$this->passwordHash($data);
		return $data;
	}
	// protected function beforeUpdate(array $data)  {
	// 	$data=$this->passwordHash($data);
	// 	return $data;
	// }

	protected function passwordHash(array $data){
		   if(!isset($data['data']))
        	$data['data']=password_hash($data['data'], PASSWORD_DEFAULT);
		return $data;

	}
} 
?>