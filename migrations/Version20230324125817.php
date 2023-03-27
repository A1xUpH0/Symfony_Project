<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324125817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE duck ADD COLUMN is_verified BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__duck AS SELECT id, email, roles, password, firstname, lastname, duckname FROM duck');
        $this->addSql('DROP TABLE duck');
        $this->addSql('CREATE TABLE duck (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, firstname VARCHAR(63) NOT NULL, lastname VARCHAR(63) NOT NULL, duckname VARCHAR(31) NOT NULL)');
        $this->addSql('INSERT INTO duck (id, email, roles, password, firstname, lastname, duckname) SELECT id, email, roles, password, firstname, lastname, duckname FROM __temp__duck');
        $this->addSql('DROP TABLE __temp__duck');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_538A9547E7927C74 ON duck (email)');
    }
}
