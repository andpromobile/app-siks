<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class BagiankerjaModel extends Model {
    
	protected $table = 'bagian_kerja';
	protected $primaryKey = 'kode';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['varchar'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}