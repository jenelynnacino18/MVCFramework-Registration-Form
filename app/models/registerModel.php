<?php
class RegisterModel {
    private $db;
    function __construct() {
        $this->db = new Database;
    }
    function uidRandomString() {
        return bin2hex(random_bytes(5));
    }
    function insert($data) {
        $this->db->query("INSERT INTO registration(reg_uid, reg_full_name, reg_birth_month, reg_birth_day, reg_birth_year, reg_sex, reg_nationality, reg_mobile_number, reg_complete_address, reg_email) VALUES(:reguid, :regfname, :regbm, :regbd, :regby, :regsx, :regntnlty, :regmn, :regcadd, :regemail)");
        $this->db->binVal(':reguid', $data['regUID']);
        $this->db->binVal(':regfname', $data['regFullname']);
        $this->db->binVal(':regbm', $data['regBMonth']);
        $this->db->binVal(':regbd', $data['regBDay']);
        $this->db->binVal(':regby', $data['regBYear']);
        $this->db->binVal(':regsx', $data['regSex']);
        $this->db->binVal(':regntnlty', $data['regNationality']);
        $this->db->binVal(':regmn', $data['regMNumber']);
        $this->db->binVal(':regcadd', $data['regCAddress']);
        $this->db->binVal(':regemail', $data['regEmail']);
        $this->db->execQuery();
    }
}