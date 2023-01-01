<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
	
    protected $anggotaModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->anggotaModel = new AnggotaModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'anggota',
                'title'     		=> 'anggota'				
			];
		
		return view('anggota', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->anggotaModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->nama,
$value->nik,
$value->tempat_lahir,
$value->tanggal_lahir,
$value->alamat,
$value->nama_ibu_kandung,
$value->jenis_kelamin,
$value->no_hp,
$value->status,
$value->agama,
$value->pekerjaan,
$value->instansi,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->anggotaModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
$fields['nama'] = $this->request->getPost('nama');
$fields['nik'] = $this->request->getPost('nik');
$fields['tempat_lahir'] = $this->request->getPost('tempat_lahir');
$fields['tanggal_lahir'] = $this->request->getPost('tanggal_lahir');
$fields['alamat'] = $this->request->getPost('alamat');
$fields['nama_ibu_kandung'] = $this->request->getPost('nama_ibu_kandung');
$fields['jenis_kelamin'] = $this->request->getPost('jenis_kelamin');
$fields['no_hp'] = $this->request->getPost('no_hp');
$fields['status'] = $this->request->getPost('status');
$fields['agama'] = $this->request->getPost('agama');
$fields['pekerjaan'] = $this->request->getPost('pekerjaan');
$fields['instansi'] = $this->request->getPost('instansi');


        $this->validation->setRules([
			            'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[100]'],
            'nik' => ['label' => 'Nik', 'rules' => 'required|min_length[0]|max_length[16]'],
            'tempat_lahir' => ['label' => 'Tempat lahir', 'rules' => 'required|min_length[0]|max_length[100]'],
            'tanggal_lahir' => ['label' => 'Tanggal lahir', 'rules' => 'required|valid_date|min_length[0]'],
            'alamat' => ['label' => 'Alamat', 'rules' => 'required|min_length[0]'],
            'nama_ibu_kandung' => ['label' => 'Nama ibu kandung', 'rules' => 'required|min_length[0]|max_length[50]'],
            'jenis_kelamin' => ['label' => 'Jenis kelamin', 'rules' => 'required|min_length[0]|max_length[1]'],
            'no_hp' => ['label' => 'No hp', 'rules' => 'required|min_length[0]|max_length[20]'],
            'status' => ['label' => 'Status', 'rules' => 'required|min_length[0]|max_length[20]'],
            'agama' => ['label' => 'Agama', 'rules' => 'required|min_length[0]|max_length[20]'],
            'pekerjaan' => ['label' => 'Pekerjaan', 'rules' => 'required|min_length[0]|max_length[50]'],
            'instansi' => ['label' => 'Instansi', 'rules' => 'required|min_length[0]|max_length[100]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->anggotaModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
$fields['nama'] = $this->request->getPost('nama');
$fields['nik'] = $this->request->getPost('nik');
$fields['tempat_lahir'] = $this->request->getPost('tempat_lahir');
$fields['tanggal_lahir'] = $this->request->getPost('tanggal_lahir');
$fields['alamat'] = $this->request->getPost('alamat');
$fields['nama_ibu_kandung'] = $this->request->getPost('nama_ibu_kandung');
$fields['jenis_kelamin'] = $this->request->getPost('jenis_kelamin');
$fields['no_hp'] = $this->request->getPost('no_hp');
$fields['status'] = $this->request->getPost('status');
$fields['agama'] = $this->request->getPost('agama');
$fields['pekerjaan'] = $this->request->getPost('pekerjaan');
$fields['instansi'] = $this->request->getPost('instansi');


        $this->validation->setRules([
			            'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[100]'],
            'nik' => ['label' => 'Nik', 'rules' => 'required|min_length[0]|max_length[16]'],
            'tempat_lahir' => ['label' => 'Tempat lahir', 'rules' => 'required|min_length[0]|max_length[100]'],
            'tanggal_lahir' => ['label' => 'Tanggal lahir', 'rules' => 'required|valid_date|min_length[0]'],
            'alamat' => ['label' => 'Alamat', 'rules' => 'required|min_length[0]'],
            'nama_ibu_kandung' => ['label' => 'Nama ibu kandung', 'rules' => 'required|min_length[0]|max_length[50]'],
            'jenis_kelamin' => ['label' => 'Jenis kelamin', 'rules' => 'required|min_length[0]|max_length[1]'],
            'no_hp' => ['label' => 'No hp', 'rules' => 'required|min_length[0]|max_length[20]'],
            'status' => ['label' => 'Status', 'rules' => 'required|min_length[0]|max_length[20]'],
            'agama' => ['label' => 'Agama', 'rules' => 'required|min_length[0]|max_length[20]'],
            'pekerjaan' => ['label' => 'Pekerjaan', 'rules' => 'required|min_length[0]|max_length[50]'],
            'instansi' => ['label' => 'Instansi', 'rules' => 'required|min_length[0]|max_length[100]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->anggotaModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
            }
        }
		
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->anggotaModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
