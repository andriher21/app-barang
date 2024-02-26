<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
	protected $table = 'tb_barang';
	protected $primaryKey = 'id_barang';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['id_jenis_barang','nama_barang', 'harga', 'stok_barang'];
	
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
	
	public function selectall()
	{	$db = db_connect();
		$sql = "SELECT a.*,b.nama_jenis_barang FROM tb_barang a LEFT JOIN tb_jenis_barang b ON a.id_jenis_barang = 
		b.id_jenis_barang ";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function selectwhere($id)
	{	$db = db_connect();
		$sql = "SELECT * FROM tb_barang where id_barang = ?";
		$data = $db->query($sql,$id)->getResultArray();;
		return $data;
	}
	public function selectcount()
	{	$db = db_connect();
		$sql = "SELECT count(id_barang) as count FROM tb_barang";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function insertData($data)
	{
		$db = db_connect();
		$sql = "INSERT INTO tb_barang (id_jenis_barang,nama_barang,harga,stok) VALUES 
		(" . $db->escape($data['kategory']) . "," . $db->escape($data['nama']) .
                "," . $db->escape($data['harga']) . "," . $db->escape($data['stok']) .")";
		$insert =  $db->query($sql);
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
		$db = db_connect();
		$sql = "UPDATE tb_barang SET id_jenis_barang = " . $db->escape($data['kategory']) . "
		, nama_barang= " . $db->escape($data['nama']) .", harga= " . $db->escape($data['harga'])
		  .",stok=" . $db->escape($data['stok']) .
		" WHERE id_barang = " . $db->escape($id) ."";
		$update =  $db->query($sql);
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
		$db = db_connect();
		$sql = "DELETE FROM tb_barang WHERE id_barang = " . $db->escape($id) ." ";
		$delete= $db->query($sql);
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