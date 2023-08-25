<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['name', 'email'];
    public function getUsers($id = false) {
      if($id === false) {
        return $this->findAll();
      } else {
          return $this->getWhere(['id' => $id]);
      }
    }

    public function DeleteData($id = null){

 $data['post'] = $this->where('id', $id)->delete();
    }
    public function UpdateData($id=null,$data)
    {
        $this->update($id,$data);
    }
    public function EditData($id=null){
    
      $Edituser = $this->find($id);

      $data['user'] = $Edituser;
      return $data;
}
}
