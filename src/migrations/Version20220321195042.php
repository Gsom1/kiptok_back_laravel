<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220321195042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE player_event (
                    id SERIAL PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    value VARCHAR(255),
                    session_id VARCHAR(255) NOT NULL,
                    video_id INT NOT NULL,
                    created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL
                  )'
        );
        $this->addSql('COMMENT ON COLUMN player_event.value IS \'Some related value of event, like amount of seconds if rewind\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE player_event');
    }
}
