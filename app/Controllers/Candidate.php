<?php

namespace App\Controllers;

use \Codeigniter\Controller;

use \App\Models\CandidateModel;

class Candidate extends BaseController
{
    public $candidateModel;
    public $session;
    public function __construct() {
        helper ("form");
        $this->candidateModel = new CandidateModel();
        $this->session = \Config\Services::session();
    }

    public function candidateAdd(){
        if(!session()->has('logged_inuser')){
            return redirect()->to(base_url().'login');
        }
        $data = [];
        if($this->request->getMethod() == 'post'){
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'address' => 'required',
            'dob' => 'required',
            'sex' => 'required',
            'language' => 'required',
            'salary' => 'required|min_length[4]',
            'pdf' => 'uploaded[pdf]|ext_in[pdf,pdf]'
        ];
        
            if($this->validate($rules)){
                $pdf = $this->request->getFile('pdf');
                if($pdf->isValid() && !$pdf->hasMoved()){
                    if($pdf->move(FCPATH.'public\uploads', $pdf->getRandomName())){
                        $pdfpath = $pdf->getName();
                    }                      
                }
                $language = implode(',',$_POST['language']);
                //echo'<pre>';print_r($language);die;
                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'dob' => $this->request->getVar('dob'),
                    'address' => $this->request->getVar('address'),
                    'sex' => $this->request->getVar('sex'),
                    'language' => $language,
                    'salary' => $this->request->getVar('salary'),
                    'pdf' => $pdfpath,
                ];
                //echo'<pre>';print_r($data);die;
                $status = $this->candidateModel->saveData($data);
                if($status){
                    $this->session->setTempdata('success', 'Candidate Added Successfully');
                    return redirect()->to(base_url().'candidate/list');
                    //return redirect()->to(current_url());
                }
                else{
                    $this->session->setTempdata('errors', 'Sorry try again some time');
                    return redirect()->to(current_url());
                } 
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        return view('candidate/add',$data);
    }

    public function candidateList(){
        if(!session()->has('logged_inuser')){
            return redirect()->to(base_url().'login');
        }
        $data['candidate'] = $this->candidateModel->getUsers();
        return view('candidate/list', $data);
    }

    public function candidateView($id=null){
        if(!session()->has('logged_inuser')){
            return redirect()->to(base_url().'login');
        }
        $data['candidate'] = $this->candidateModel->getUsersId($id);
        return view('candidate/view',$data);
    }

    public function login(){
        $data =[];
        $data['validation'] = null;

        if($this->request->getMethod()=='post'){
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];
           if($this->validate($rules)){
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $data = $this->candidateModel->verifyEmail($email);
                //echo'<pre>';print_r($data);die;
                if($data){
                    if(password_verify($password, $data->password)){
                        $this->session->set('logged_inuser', $data->id);
                        return redirect()->to(base_url().'candidate/list');
                    }
                    else{
                        $this->session->setTempdata('error','Sorry You Entered Wrong Password');
                        return redirect()->to(current_url());
                    }
                }
                else{
                    $this->session->setTempdata('error','Sorry Your Entered Wrong Credentials');
                    return redirect()->to(current_url());
                }
           }
           else{
            $data['validation'] = $this->validator;
           } 
        }
        return view('login',$data);
    }

    public function logout(){
        session()->remove('logged_inuser');
        session()->destroy();
        return redirect()->to(base_url().'login');
    }
}
