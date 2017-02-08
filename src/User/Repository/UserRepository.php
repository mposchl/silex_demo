<?php
namespace Demo\User\Repository;

use Nette\Database\Connection;

/**
 * @author Martin Pöschl <martin.poschl@gmail.com>
 */
class UserRepository
{
    /**
     * @var Connection
     */
    private $db;

    /**
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->db->query('select * from user')->fetchAll();
    }

    /**
     * @param int $userId
     * @return bool|\Nette\Database\IRow
     */
    public function findById($userId)
    {
        return $this->db->query('select * from user where id = ?', $userId)->fetch();
    }

    /**
     * @param array $user
     * @return string
     */
    public function create(array $user)
    {
        $this->db->query('insert into user', $user);

        return $this->db->getInsertId();
    }

    /**
     * @param $login
     * @return bool|\Nette\Database\Row
     */
    public function findByLogin($login)
    {
        return $this->db->query('select * from user where login = ?', $login)->fetch();
    }

    /**
     * @param $userId
     * @return \Nette\Database\ResultSet
     */
    public function deleteById($userId)
    {
        return $this->db->query('delete from user where id = ?', $userId);
    }
}