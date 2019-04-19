<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Modelo que representa o usuário geral do sistema
 */
class User_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }
    /**
     * Busca um usuário
     * @param id Id do usuário para buscar
     * @return User Usuário ou null caso não encontre
     */
    public function getOne($id)
    {
        return $this->db
            ->where('id', $id)
            ->get('user')
            ->row();
    }
    /**
     * Busca uma lista de usuários usando paginação
     * @param page Página para buscar.
     * @param pageSize Tamanho da página para buscar.
     * @return Array<User> Lista de usuários
     */
    public function getAll($page, $pageSize)
    {
        if ($page && $pageSize) {
            $this->db->limit($pageSize);
            $this->db->offset(($page - 1) * $pageSize);
        }
        return $this->db
            ->get('user')
            ->result();
    }
    /**
     * Insere um usuário no banco de dados.
     * @param data Dados do usuário
     * @return boolean Indica se teve sucesso na inserção
     */
    public function insert($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->insert('user', $data);
    }

    /**
     * Atualiza um usuário no banco de dados.
     * @param data Dados do usuário
     * @return boolean Indica se teve sucesso na atualização
     */
    public function update($id, $data) 
    {
        if(array_key_exists('password', $data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->db
            ->where('id', $id)
            ->update('user', $data);
    }

    /**
     * Deleta um usuário no banco de dados.
     * @param id Id do usuário para ser removido
     * @return boolean Indica se teve sucesso na remoção.
     */
    public function delete($id)
    {
        if ($id == 1) {
            return false;
        }
        return $this->db
            ->where('id', $id)
            ->delete('user');
    }

    /**
     * Verifica se um usuário existe
     * @param id Id do usuário para verificar
     * @return boolean Indica se o usuário existe
     */
    public function exists($id)
    {
        return !empty($this->db
            ->where('id', $id)
            ->get('user')
            ->row());
    }

    /**
     * Retorna o número de usuários no banco de dados
     */
    public function count()
    {
        return $this->db->count_all('user');
    }

    /**
     * Loga um usuário
     * @param email Email do usuário
     * @param password Senha do usuário
     * @return boolean Caso seja bem sucedido, retorna o id do usuário senão, retorna false.
     */
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

    /**
     * Retorna a lista de roles (permissões) de um usuário
     * @param userId Id do usuário
     */
    public function getRoles($userId)
    {
        return array_column($this->db
            ->where('userId', $userId)
            ->select('roleId')
            ->get('user_roles')
            ->result(), "roleId");
    }
}
