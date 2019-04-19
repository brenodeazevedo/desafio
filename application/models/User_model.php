<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getOne($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('user')
            ->row();
    }

    public function getAll($page, $pageSize)
    {
        if ($page && $pageSize) {
            $this->db->limit($pageSize);
            $this->db->skip(($page - 1) * $pageSize);
        }
        return $this->db
            ->get('user')
            ->result();
    }

    public function insert($data)
    {
        return $this->db->insert('user', [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update('user', [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            ]);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete('user');
    }

    public function login($email, $password)
    {
        $user = $this->db
            ->where('email', $email)
            ->get('user')
            ->row();
        if (!$user) {
            return false;
        }
        return password_verify($password, $user->password) ? $user->id : false;
    }

    public function getRoles($userId)
    {
        return array_column($this->db
            ->where('userId', $userId)
            ->select('roleId')
            ->get('user_roles')
            ->result(), "roleId");
    }
}
