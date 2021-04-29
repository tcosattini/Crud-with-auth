<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429123802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE city (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE flight (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, departure_id INTEGER NOT NULL, arrival_id INTEGER NOT NULL, numero VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, schedule TIME DEFAULT NULL, reduction BOOLEAN DEFAULT NULL, seat INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_C257E60E7704ED06 ON flight (departure_id)');
        $this->addSql('CREATE INDEX IDX_C257E60E62789708 ON flight (arrival_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE flight');
    }
}
