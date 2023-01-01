<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class AnggotaModel extends Model {
    
	protected $table = 'anggota';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nama', 'nik', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'nama_ibu_kandung', 'jenis_kelamin', 'no_hp', 'status', 'agama', 'pekerjaan', 'instansi'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}