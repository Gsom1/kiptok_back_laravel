<?php

namespace App\Doctrine;

use Doctrine\DBAL\Connection;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\Migrations\Version\MigrationFactory as SymfonyMigrationFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;

class MigrationFactory implements SymfonyMigrationFactory
{
    public function __construct(
        private Connection        $connection,
        private LoggerInterface   $logger,
        private PdoSessionHandler $pdoSessionHandler
    ) {
    }

    public function createVersion(string $migrationClassName): AbstractMigration
    {
        $migration = new $migrationClassName($this->connection, $this->logger);
        if ($migration instanceof SessionHandlerAwareInterface) {
            $migration->setSessionHandler($this->pdoSessionHandler);
        }

        return $migration;
    }
}
