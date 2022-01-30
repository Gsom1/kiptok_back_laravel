<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211219040729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE feed_cursor (
            id uuid PRIMARY KEY,
            start INT NOT NULL,
            last INT DEFAULT NULL,
            single TEXT DEFAULT NULL)'
        );
        $this->addSql('COMMENT ON COLUMN feed_cursor.single IS \'(DC2Type:array)\'');

        $this->addSql('CREATE SEQUENCE video_id_seq INCREMENT BY 1 MINVALUE 1 START 1;');
        $this->addSql('CREATE TABLE video (
            id INT NOT NULL,
            url VARCHAR(255) NOT NULL, 
            poster VARCHAR(255) DEFAULT NULL, 
            created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, 
            PRIMARY KEY(id))
        ');
        $this->addSql('COMMENT ON COLUMN video.created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE video_id_seq CASCADE');
        $this->addSql('DROP TABLE feed_cursor');
        $this->addSql('DROP TABLE video');
    }
}
