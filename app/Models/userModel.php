<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class userModel extends Model
{
    protected $table  = 'user';
    protected $db;
	
	public function __construct(ConnectionInterface &$db) {
		$this->db =& $db;
	}

	function add($data) {
		return $this->db
                        ->table('user')
                        ->insert($data);
	}

	public function getData($id = false) {
		if($id === false) {
		  return $this->findAll();
		} else {
			return $this->getWhere(['id' => $id]);
		}
	  }
}