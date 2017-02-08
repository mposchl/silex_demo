<?php

use Phinx\Migration\AbstractMigration;

class Init extends AbstractMigration
{
    public function up()
    {
        $sql = "
            DROP TABLE IF EXISTS `user`;
            CREATE TABLE `user` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `first_name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
              `last_name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
              `login` varchar(8) COLLATE utf8_czech_ci NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
        ";

        $this->execute($sql);
    }
}
