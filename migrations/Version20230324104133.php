<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324104133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__quack AS SELECT id, message, created_at, tags FROM quack');
        $this->addSql('DROP TABLE quack');
        $this->addSql('CREATE TABLE quack (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, message CLOB NOT NULL, created_at DATETIME NOT NULL, tags CLOB DEFAULT NULL --(DC2Type:array)
        , CONSTRAINT FK_83D44F6FF675F31B FOREIGN KEY (author_id) REFERENCES duck (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO quack (id, message, created_at, tags) SELECT id, message, created_at, tags FROM __temp__quack');
        $this->addSql('DROP TABLE __temp__quack');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_83D44F6FF675F31B ON quack (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__quack AS SELECT id, message, created_at, tags FROM quack');
        $this->addSql('DROP TABLE quack');
        $this->addSql('CREATE TABLE quack (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, message CLOB NOT NULL, created_at DATETIME NOT NULL, tags CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('INSERT INTO quack (id, message, created_at, tags) SELECT id, message, created_at, tags FROM __temp__quack');
        $this->addSql('DROP TABLE __temp__quack');
    }
}
