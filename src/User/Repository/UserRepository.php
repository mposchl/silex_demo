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

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        return $this->db->query('select * from user')->fetchAll();
    }
}