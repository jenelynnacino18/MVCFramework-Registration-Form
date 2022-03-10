<?php
class Register extends Core {
    function __construct() {
        $this->regModel = $this->model('RegisterModel');
    }
    function index() {
        $regUID = $this->regModel->uidRandomString();
        $data = [
            'regUID' => $regUID,
            'error' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'regUID' => trim($_POST['regUID']),
                'regFullname' => trim($_POST['regFullname']),
                'regBMonth' => trim($_POST['regBMonth']),
                'regBDay' => trim($_POST['regBDay']),
                'regBYear' => trim($_POST['regBYear']),
                'regSex' => trim($_POST['regSex']),
                'regNationality' => trim($_POST['regNationality']),
                'regMNumber' => trim($_POST['regMNumber']),
                'regCAddress' => trim($_POST['regCAddress']),
                'regEmail' => trim($_POST['regEmail'])
            ];
            if($data['regFullname'] != '' && $data['regBDay'] != '' && $data['regBYear'] != '' && $data['regSex'] != '' && $data['regNationality'] != '' && $data['regMNumber'] != '' && ['regCAddress'] != '' && $data['regEmail'] != '') {
                if($data['regBMonth'] === 'Month') {
                    $data['error'] = 'BIRTH MONTH IS NOT CORRECT';
                } else {
                    if(!preg_match("/^[0-9]*$/", $data['regMNumber'])) {
                        $data['error'] = 'INPUT ONLY NUMERIC';
                    } else {
                        if(!preg_match("/^[0-9]*$/", $data['regBDay'])) {
                            $data['error'] = 'INPUT ONLY NUMERIC';
                        }else {
                            if(!preg_match("/^[0-9]*$/", $data['regBYear'])) {
                                $data['error'] = 'INPUT ONLY NUMERIC';
                            } else {
                                if(!preg_match("/^[a-zA-z]*$/", $data['regFullname'])) {
                                    $data['error'] = 'ONLY ALPHABETS AND WHITESPACE';
                                } else {
                                    if(!preg_match("/^[a-zA-z]*$/", $data['regSex'])) {
                                        $data['error'] = 'ONLY ALPHABETS AND WHITESPACE';
                                    } else {
                                        if(!preg_match("/^[a-zA-z]*$/", $data['regNationality'])) {
                                            $data['error'] = 'ONLY ALPHABETS AND WHITESPACE';
                                        } else {
                                            if(!preg_match("/^[a-zA-z]*$/", $data['regCAddress'])) {
                                                $data['error'] = 'ONLY ALPHABETS AND WHITESPACE';
                                            } else {
                                                $this->regModel->insert($data);
                                                header('location: '.URLROOT.'/register/regcomplete');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                $data['error'] = 'ALL FIELDS IS REQUIRED';
            }
        }
        $this->view('register', $data);   
    }
    function regcomplete() {
        $this->view('regcomplete');
    }
}