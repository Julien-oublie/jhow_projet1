<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202163510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avantage_culturelle (id INT AUTO_INCREMENT NOT NULL, benediction VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE background (id INT AUTO_INCREMENT NOT NULL, classe VARCHAR(255) NOT NULL, histoire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage ADD avantage_culturelle_id INT DEFAULT NULL, ADD background_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DF5D02E06 FOREIGN KEY (avantage_culturelle_id) REFERENCES avantage_culturelle (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DC93D69EA FOREIGN KEY (background_id) REFERENCES background (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AEA486DF5D02E06 ON personnage (avantage_culturelle_id)');
        $this->addSql('CREATE INDEX IDX_6AEA486DC93D69EA ON personnage (background_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DF5D02E06');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DC93D69EA');
        $this->addSql('DROP TABLE avantage_culturelle');
        $this->addSql('DROP TABLE background');
        $this->addSql('DROP INDEX UNIQ_6AEA486DF5D02E06 ON personnage');
        $this->addSql('DROP INDEX IDX_6AEA486DC93D69EA ON personnage');
        $this->addSql('ALTER TABLE personnage DROP avantage_culturelle_id, DROP background_id');
    }
}
