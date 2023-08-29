<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230829120124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prepack CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE tracking tracking VARCHAR(255) NOT NULL, CHANGE packtype packtype VARCHAR(255) DEFAULT NULL, CHANGE aux aux VARCHAR(255) DEFAULT NULL, CHANGE weight weight DOUBLE PRECISION NOT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prepack CHANGE id id INT NOT NULL, CHANGE tracking tracking VARCHAR(256) NOT NULL, CHANGE packtype packtype VARCHAR(40) DEFAULT NULL, CHANGE aux aux VARCHAR(128) DEFAULT NULL, CHANGE weight weight NUMERIC(10, 2) NOT NULL, CHANGE image image VARCHAR(256) DEFAULT NULL');
    }
}
