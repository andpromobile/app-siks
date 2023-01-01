<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class OperasionalkerjaModel extends Model {
    
	protected $table = 'operasional_kerja';
	protected $primaryKey = 'nomor_transaksi';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_anggota', 'simpanan_pokok', 'simpanan_wajib', 'simpanan_sukarela'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}