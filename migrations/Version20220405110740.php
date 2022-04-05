<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405110740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armes (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, arme VARCHAR(255) NOT NULL, competence INT NOT NULL, INDEX IDX_32CF26E05E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE armes ADD CONSTRAINT FK_32CF26E05E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE personnage DROP armes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE armes');
        $this->addSql('ALTER TABLE personnage ADD armes VARCHAR(255) NOT NULL');
    }
}
