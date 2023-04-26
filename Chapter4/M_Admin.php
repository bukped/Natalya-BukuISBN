<?php

class M_Admin extends CI_Model
{
    public function getUser($id)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("id", $id);
        $query =  $this->db->get();
        return $query->row_array();
    }

    public function getUserAll()
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->join("unit", "unit.id_unit = users.unit");
        $this->db->join("roles", "roles.id_role = users.roles");
        $this->db->where("roles", '1');
        $this->db->where("status", 'Aktif');
        return $this->db->get();
    }

    public function getPinjamanAll()
    {
        $this->db->select("*");
        $this->db->from("tb_pinjaman");
        $this->db->join("users", "users.id = tb_pinjaman.id_user");
        $this->db->where("acc_1", '1');
        return $this->db->get();
    }

    public function getPinjamanAll1()
    {
        $this->db->select("*");
        $this->db->from("tb_pinjaman");
        $this->db->join("users", "users.id = tb_pinjaman.id_user");
        $this->db->where("acc_1", "0");
        return $this->db->get();
    }

    public function getPinjamanAll2()
    {
        $this->db->select("*");
        $this->db->from("tb_pinjaman");
        $this->db->join("users", "users.id = tb_pinjaman.id_user");
        $this->db->where("acc_1", "2");
        return $this->db->get();
    }

    public function getSimpananll()
    {
        $this->db->select("*");
        $this->db->from("tb_simpanan");
        $this->db->join("users", "users.id = tb_simpanan.id_user");
        return $this->db->get();
    }

    public function countPinjaman()
    {
        $this->db->select("count(id_pinjaman) as total");
        $this->db->from("tb_pinjaman");
        $query = $this->db->get();
        return $query->row_array();
    }

    public function countSimpanan()
    {
        $this->db->select("count(id_simpanan) as total");
        $this->db->from("tb_simpanan");
        $query = $this->db->get();
        return $query->row_array();
    }

    //NORMAL QUERY
    public function getData($tableName)
    {
        $res = $this->db->get($tableName);
        return $res;
    }
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

    function execute($query)
    {
        return $this->db->query($query);
    }

    function get_where_join($select, $table, $table2, $join, $where, $order_by = null)
    {
        $this->db->select($select);
        $this->db->join($table2, $join);
        $this->db->where($where);
        if ($order_by != null) {
            $this->db->order_by($order_by);
        }
        return $this->db->get($table);
    }
}
