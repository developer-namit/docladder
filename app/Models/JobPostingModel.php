<?php

namespace App\Models;

use CodeIgniter\Model;

class JobPostingModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'jobposting';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['session_id',
										'job_title',
										'key_skills',
										'min_experience',
										'max_experience',
										'min_salary',
										'max_salary',
										'location',
										'desired_profile',
										'job_function',
										'specialization',
										'job_description',
										'graduation',
										'post_graducation',
										'super_specialty',
										'company_name',
										'executive_name',
										'contact_name',
										'email',
										'status',
										'created_at'
										];
	
	
	
	function insertedudata($data){
    $this->db->table("jobposting")->insert($data);
    }
    
    function check_record($id){
     return $this->db->table('jobposting')->getWhere(['session_id'=>$id])->getRowArray(); 
    }
    
     function Updatdata($id,$session_id,$data){
    $this->db->table('jobposting')->where(['id'=> $id,'session_id'=>$session_id])->update($data);
    }

	public function education(){
		$data=[];
		$data['education']=[
		  '1'=>'B.PHARMA',
		  '2'=>'B.A',
		  '3'=>'BAMS',
		  '4'=>'BBA',
		  '5'=>'BCA',
		  '6'=>'B.COM',
		  '7'=>'BDS',
		  '8'=>'B.SC',
		  '9'=>'B.TECH',
		  '10'=>'BECHLOR OF REDIATION TECHNOLOGY',
		  '11'=>'BPT',
		  '12'=>'DIPLOMA IN DIALSYS TECHNICIAN',
		  '13'=>'DIPLOMA IN ECG TECHNICIAN',
		  '14'=>'DIPLOMA IN MEDICAL RECORD TECHNOLOGY',
		  '16'=>'DIPLOMA IN MTL',
		  '17'=>'DIPLOMA IN OPTOMATRY',
		  '18'=>'DIPLOMA IN OT TECHNICIAN',
		  '19'=>'DIPLOMA IN PHARMACY',
		  '20'=>'DIPLOMA IN RADIOGRAPHY TECHNOLOGY',
		  '21'=>'DIPLOMA IN X-RAY TECHNICIAN',
		  '22'=>'GNM',
		  '23'=>'MBBS',
		  '24'=>'OTHERS',
		];
		$data['postgarduate']=[
			'1'=>'D-ORTHO',
			'2'=>'DTCD',
			'3'=>'DA',
			'4'=>'DCH',
			'5'=>'DCP',
			'6'=>'DDVL',
			'7'=>'DGO',
			'8'=>'DIPLOMA IN SONOGRAPHY',
			'9'=>'DLO',
			'10'=>'DMRD',
			'11'=>'DMRE',
			'12'=>'DNB',
			'13'=>'DOMS',
			'14'=>'DPM',
			'15'=>'DVD',
			'16'=>'M PHARMA',
			'17'=>'MBA',
			'18'=>'MDS',
			'19'=>'MHA',
			'20'=>'M.SC',
			'21'=>'M.TECH',
			'22'=>'MA',
			'23'=>'MASTERS IN EMERGENCY MEDICINE(MEM)',
			'24'=>'MD',
			'25'=>'MS',
			'26'=>'PDCC',
			'27'=>'PGDM',
			'28'=>'DIPLOMA IN EMERGENY MEDICINE',
			'29'=>'OTHERS',
			
		];
		$data['specialty']=[
			'1'=>'DM',
			'2'=>'DNB',
			'3'=>'MCH',
			'4'=>'FELLOWSHIP', 
			'5'=>'P.HD',
			'6'=>'Others'
		];
	   return $data; 
	}
	
	// check apply jobs
	 function check_jobs($id, $session_id){
     return $this->db->table('applied_jobs')->getWhere(['jobposting_id'=> $id,'session_id'=>$session_id])->getRowArray(); 
    }
	
	// update jobs
	   function check_Update($id,$session_id,$data){
    $this->db->table('applied_jobs')->where(['jobposting_id'=> $id,'session_id'=>$session_id])->update($data);
    }
	
	// applied jobs
   public function appliedjobs($data){
    $this->db->table("applied_jobs")->insert($data);
    }
	
}
