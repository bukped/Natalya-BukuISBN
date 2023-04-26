<?php

class M_Auth extends CI_Model
{
    public function getUser($id)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->join("unit", "unit.id_unit = users.unit");
        $this->db->join("roles", "roles.id_role = users.roles");
        $this->db->where("id", $id);
        $query =  $this->db->get();
        return $query->row_array();
    }

    public function getSimpananUser($id)
    {
        $this->db->select("*");
        $this->db->from("tb_simpanan");
        $this->db->join("users", "users.id = tb_simpanan.id_user");
        $this->db->where("id", $id);
        return $this->db->get();
    }

    public function getPinjamanUser($id)
    {
        $this->db->select("*");
        $this->db->from("tb_pinjaman");
        $this->db->join("users", "users.id = tb_pinjaman.id_user");
        $this->db->where("id_user", $id);
        return $this->db->get();
    }

    public function filter_date($tgl_pinjaman, $tgl_bts_pembayaran)
    {
        $this->db->where("tanggal BETWEEN $tgl_pinjaman AND $tgl_bts_pembayaran");
        return $this->db->get();
    }

    //NORMAL QUERY


    public function InsertData($tableName, $data)
    {
        $res = $this->db->insert($tableName, $data);
        return $res;
    }

    public function UpdateData($tableName, $data, $where)
    {
        $res = $this->db->update($tableName, $data, $where);
        return $res;
    }

    public function DeleteData($tableName, $where)
    {
        $res = $this->db->delete($tableName, $where);
        return $res;
    }
}
