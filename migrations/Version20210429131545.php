<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429131545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_C257E60E62789708');
        $this->addSql('DROP INDEX IDX_C257E60E7704ED06');
        $this->addSql('CREATE TEMPORARY TABLE __temp__flight AS SELECT id, departure_id, arrival_id, numero, price, schedule, reduction, seat FROM flight');
        $this->addSql('DROP TABLE flight');
        $this->addSql('CREATE TABLE flight (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, departure_id INTEGER NOT NULL, arrival_id INTEGER NOT NULL, numero VARCHAR(255) NOT NULL COLLATE BINARY, price DOUBLE PRECISION NOT NULL, schedule TIME DEFAULT NULL, reduction BOOLEAN DEFAULT NULL, seat INTEGER DEFAULT NULL, CONSTRAINT FK_C257E60E7704ED06 FOREIGN KEY (departure_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C257E60E62789708 FOREIGN KEY (arrival_id) REFERENCES city (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO flight (id, departure_id, arrival_id, numero, price, schedule, reduction, seat) SELECT id, departure_id, arrival_id, numero, price, schedule, reduction, seat FROM __temp__flight');
        $this->addSql('DROP TABLE __temp__flight');
        $this->addSql('CREATE INDEX IDX_C257E60E62789708 ON flight (arrival_id)');
        $this->addSql('CREATE INDEX IDX_C257E60E7704ED06 ON flight (departure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_C257E60E7704ED06');
        $this->addSql('DROP INDEX IDX_C257E60E62789708');
        $this->addSql('CREATE TEMPORARY TABLE __temp__flight AS SELECT id, departure_id, arrival_id, numero, price, schedule, reduction, seat FROM flight');
        $this->addSql('DROP TABLE flight');
        $this->addSql('CREATE TABLE flight (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, departure_id INTEGER NOT NULL, arrival_id INTEGER NOT NULL, numero VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, schedule TIME DEFAULT NULL, reduction BOOLEAN DEFAULT NULL, seat INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO flight (id, departure_id, arrival_id, numero, price, schedule, reduction, seat) SELECT id, departure_id, arrival_id, numero, price, schedule, reduction, seat FROM __temp__flight');
        $this->addSql('DROP TABLE __temp__flight');
        $this->addSql('CREATE INDEX IDX_C257E60E7704ED06 ON flight (departure_id)');
        $this->addSql('CREATE INDEX IDX_C257E60E62789708 ON flight (arrival_id)');
    }
}
