<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\OperasionalkerjaModel;

class Operasionalkerja extends BaseController
{
	
    protected $operasionalkerjaModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->operasionalkerjaModel = new OperasionalkerjaModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'operasionalkerja',
                'title'     		=> 'operasional_kerja'				
			];
		
		return view('operasionalkerja', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->operasionalkerjaModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->nomor_transaksi .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->nomor_transaksi .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->nomor_transaksi,
$value->id_anggota,
$value->simpanan_pokok,
$value->simpanan_wajib,
$value->simpanan_sukarela,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('nomor_transaksi');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->operasionalkerjaModel->where('nomor_transaksi' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['nomor_transaksi'] = $this->request->getPost('nomor_transaksi');
$fields['id_anggota'] = $this->request->getPost('id_anggota');
$fields['simpanan_pokok'] = $this->request->getPost('simpanan_pokok');
$fields['simpanan_wajib'] = $this->request->getPost('simpanan_wajib');
$fields['simpanan_sukarela'] = $this->request->getPost('simpanan_sukarela');


        $this->validation->setRules([
			            'id_anggota' => ['label' => 'Id anggota', 'rules' => 'required|min_length[0]|max_length[20]'],
            'simpanan_pokok' => ['label' => 'Simpanan pokok', 'rules' => 'required|min_length[0]|max_length[10]'],
            'simpanan_wajib' => ['label' => 'Simpanan wajib', 'rules' => 'required|min_length[0]|max_length[10]'],
            'simpanan_sukarela' => ['label' => 'Simpanan sukarela', 'rules' => 'required|min_length[0]|max_length[10]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->operasionalkerjaModel->insert($fields)) {
												
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
		
		$fields['nomor_transaksi'] = $this->request->getPost('nomor_transaksi');
$fields['id_anggota'] = $this->request->getPost('id_anggota');
$fields['simpanan_pokok'] = $this->request->getPost('simpanan_pokok');
$fields['simpanan_wajib'] = $this->request->getPost('simpanan_wajib');
$fields['simpanan_sukarela'] = $this->request->getPost('simpanan_sukarela');


        $this->validation->setRules([
			            'id_anggota' => ['label' => 'Id anggota', 'rules' => 'required|min_length[0]|max_length[20]'],
            'simpanan_pokok' => ['label' => 'Simpanan pokok', 'rules' => 'required|min_length[0]|max_length[10]'],
            'simpanan_wajib' => ['label' => 'Simpanan wajib', 'rules' => 'required|min_length[0]|max_length[10]'],
            'simpanan_sukarela' => ['label' => 'Simpanan sukarela', 'rules' => 'required|min_length[0]|max_length[10]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->operasionalkerjaModel->update($fields['nomor_transaksi'], $fields)) {
				
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
		
		$id = $this->request->getPost('nomor_transaksi');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->operasionalkerjaModel->where('nomor_transaksi', $id)->delete()) {
								
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
