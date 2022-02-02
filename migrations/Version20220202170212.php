<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202170212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnage_traits (personnage_id INT NOT NULL, traits_id INT NOT NULL, INDEX IDX_22062BD85E315342 (personnage_id), INDEX IDX_22062BD84BD15C06 (traits_id), PRIMARY KEY(personnage_id, traits_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traits (id INT AUTO_INCREMENT NOT NULL, specialite VARCHAR(255) NOT NULL, particularite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vocation (id INT AUTO_INCREMENT NOT NULL, indication VARCHAR(255) NOT NULL, part_dombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage_traits ADD CONSTRAINT FK_22062BD85E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_traits ADD CONSTRAINT FK_22062BD84BD15C06 FOREIGN KEY (traits_id) REFERENCES traits (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage_traits DROP FOREIGN KEY FK_22062BD84BD15C06');
        $this->addSql('DROP TABLE personnage_traits');
        $this->addSql('DROP TABLE traits');
        $this->addSql('DROP TABLE vocation');
    }
}
