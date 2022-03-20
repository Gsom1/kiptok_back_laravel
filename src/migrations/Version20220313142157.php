<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220313142157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE content_tag (id SERIAL PRIMARY KEY, name VARCHAR(64) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX content_tag_name_idx on content_tag (name)');
        $this->addSql('
CREATE TABLE video_tag_map (video_id INT NOT NULL, tag_name VARCHAR(64) NOT NULL, PRIMARY KEY(video_id, tag_name),
    CONSTRAINT fk_video_id FOREIGN KEY (video_id) REFERENCES video(id),
    CONSTRAINT fk_tag_name FOREIGN KEY (tag_name) REFERENCES content_tag(name)
)
');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP CONSTRAINT fk_video_id');
        $this->addSql('DROP CONSTRAINT fk_tag_name');
        $this->addSql('DROP INDEX IF EXISTS content_tag_name_idx');
        $this->addSql('DROP TABLE content_tag');
        $this->addSql('DROP TABLE video_tag_map');
    }
}
