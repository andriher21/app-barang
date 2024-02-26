<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoryModel extends Model
{
	protected $table = 'tb_jenis_barang';
	protected $primaryKey = 'id_jenis_barang';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['id_jenis_barang','nama_jenis_barang'	];
	
	protected $useTimestamps = false;
	
	// protected $validationRules    = [
    //     'company_name' => 'required|min_length[5]',
    //     'company_address' => 'required|min_length[5]',
    // ];
	
	// protected $validationMessages = [
    //     'customername' => [
    //         'required' => 'Bagian Name Harus diisi',
    //         'min_length' => 'Minimal 5 Karakter'
    //     ],
    //     'customeraddr' => [
    //         'required' => 'Bagian Addr Harus diisi',
    //         'min_length' => 'Minimal 5 Karakter'
    //     ]
    // ];
    protected $skipValidation  = false;
	
	public function indexData()
	{
		$db = db_connect();
		$sql = "SELECT * FROM tb_jenis_barang ";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function selectcount()
	{	$db = db_connect();
		$sql = "SELECT count(id_jenis_barang) as count FROM tb_jenis_barang";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function selectwhere($id)
	{	$db = db_connect();
		$sql = "SELECT * FROM tb_jenis_barang where id_jenis_barang = ?";
		$data = $db->query($sql,$id)->getResultArray();;
		return $data;
	}
	public function selectData($data)
	{
		$barang = new KategoryModel();
		$data = $barang->find($data);
		return $data;
	}
	
	public function insertData($data)
	{
		$barang = new KategoryModel();
		$insert = $barang->insert($data
		);
		
		if ($insert) {
			return ([
			    'status'=> 0,
                'message'=>'new transaction created'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to create new data']);
		}
	}
	
	public function updateData($id,$data)
	{
		$barang = new KategoryModel();
		$update = $barang->update($id,$data);
		
		if ($update) {
			return ([
			    'status'=> 0,
                'message'=>'update  done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to update data']);
		}
	}
	
	public function deleteData($id)
	{
		$jenisbarang = new KategoryModel();
		$delete= $jenisbarang->delete($id);
			if ($delete) {
			return ([
			    'status'=> 0,
                'message'=>'delete trans done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to delete trans']);
		}
	}
	
	
}