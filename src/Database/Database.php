<?php 

namespace CmdApi\Database;

use CmdApi\Database\Constants;

class Database
{
        
    private static ?self $instance = null;
    private \PDO $pdo;

    private function __construct()
    {
        $this->pdo = new \PDO(
            "mysql:dbname=".Constants::DB_NAME.";host=".Constants::DB_HOST,
            Constants::DB_USER,
            Constants::DB_PASSWORD,
        [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ]
        );
    }
    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    public function pdo(): \PDO
    {
        return $this->pdo;
    }
}
