<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Doctrine\SessionHandlerAwareInterface;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Psr\Log\LoggerInterface;
use SessionHandlerInterface;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220130204540 extends AbstractMigration implements SessionHandlerAwareInterface
{
    private PdoSessionHandler $sessionHandler;

    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        parent::__construct($connection, $logger);
    }

    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        try {
            $this->sessionHandler->createTable();
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE "sessions"');
    }

    public function setSessionHandler(SessionHandlerInterface $sessionHandler)
    {
        assert($sessionHandler instanceof PdoSessionHandler);
        $this->sessionHandler = $sessionHandler;
    }
}
