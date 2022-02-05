<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220205100354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, admiration INT DEFAULT NULL, atletique INT DEFAULT NULL, confiance INT DEFAULT NULL, exploration INT DEFAULT NULL, chant INT DEFAULT NULL, artisanat INT DEFAULT NULL, inspiration INT DEFAULT NULL, voyage INT DEFAULT NULL, perspicacite INT DEFAULT NULL, guerison INT DEFAULT NULL, courtoisie INT DEFAULT NULL, combat INT DEFAULT NULL, persuasion INT DEFAULT NULL, furtivite INT DEFAULT NULL, rechercher INT DEFAULT NULL, chasse INT DEFAULT NULL, enigme INT DEFAULT NULL, tradition INT DEFAULT NULL, UNIQUE INDEX UNIQ_94D4687F5E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nbr_place INT NOT NULL, UNIQUE INDEX UNIQ_4B98C21A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_personnage (groupe_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_D20779B17A45358C (groupe_id), INDEX IDX_D20779B15E315342 (personnage_id), PRIMARY KEY(groupe_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recompense (id INT AUTO_INCREMENT NOT NULL, objet VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recompense_personnage (recompense_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_DC68AF34D714096 (recompense_id), INDEX IDX_DC68AF35E315342 (personnage_id), PRIMARY KEY(recompense_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertu (id INT AUTO_INCREMENT NOT NULL, caractere VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertu_personnage (vertu_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_BE76F42759CA8275 (vertu_id), INDEX IDX_BE76F4275E315342 (personnage_id), PRIMARY KEY(vertu_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE groupe_personnage ADD CONSTRAINT FK_D20779B17A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_personnage ADD CONSTRAINT FK_D20779B15E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recompense_personnage ADD CONSTRAINT FK_DC68AF34D714096 FOREIGN KEY (recompense_id) REFERENCES recompense (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recompense_personnage ADD CONSTRAINT FK_DC68AF35E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vertu_personnage ADD CONSTRAINT FK_BE76F42759CA8275 FOREIGN KEY (vertu_id) REFERENCES vertu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vertu_personnage ADD CONSTRAINT FK_BE76F4275E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groupe_personnage DROP FOREIGN KEY FK_D20779B17A45358C');
        $this->addSql('ALTER TABLE recompense_personnage DROP FOREIGN KEY FK_DC68AF34D714096');
        $this->addSql('ALTER TABLE vertu_personnage DROP FOREIGN KEY FK_BE76F42759CA8275');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE groupe_personnage');
        $this->addSql('DROP TABLE recompense');
        $this->addSql('DROP TABLE recompense_personnage');
        $this->addSql('DROP TABLE vertu');
        $this->addSql('DROP TABLE vertu_personnage');
        $this->addSql('ALTER TABLE arme CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE groupe groupe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE notes notes VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE armure CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE protection protection VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE avantage_culturelle CHANGE benediction benediction VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE background CHANGE classe classe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE histoire histoire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE bouclier CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE esquive esquive VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE classe CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personnage CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE standard_de_vie standard_de_vie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE table_of_years CHANGE evenement evenement VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE traits CHANGE specialite specialite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE particularite particularite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vocation CHANGE indication indication VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE part_dombre part_dombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
