<?php

namespace App\Models;

use \CodeIgniter\Model;

class CandidateModel extends Model {
    
    public function saveData($data){
        
        $db = \config\Database::connect();        
        $builder = $db->table('candidate_register');        
        $res = $builder->insert($data);
        if($db->affectedRows() >= 1 ){
            return true;
        }
        else{
            return false;
        }
    }

    public function getUsers()
    {
        $db = \config\Database::connect();
        $query = $db->query('select * from candidate_register');
        $result = $query->getResult();
        if(count ($result) > 0){
            return $result;
        }
        else{
            return false;
        }
    }

    public function getUsersId($id)
    {
        $db = \config\Database::connect();
        $builder = $this->db->table('candidate_register');
        $builder->select('*');
        $result = $builder->where('id',$id);
        $result = $builder->get();
        $result->resultID->num_rows;
        if(1 == 1){
            return $result->getRow();
        }
        else{
            return false;
        }
    }

    public function verifyEmail($email){
        $db = \config\Database::connect();
        $builder = $this->db->table('register');
        $builder->select('username, email, id, password');
        $builder->where('email',$email);
        $result = $builder->get();
        if(1 == 1){
            return $result->getRow();
        }
        else{
            return false;
        }
    }
}