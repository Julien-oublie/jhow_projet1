<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213220255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme (id INT AUTO_INCREMENT NOT NULL, endurance_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, dommage INT NOT NULL, blessure INT NOT NULL, enc INT NOT NULL, groupe VARCHAR(255) NOT NULL, notes VARCHAR(255) NOT NULL, INDEX IDX_18207379119EEBC1 (endurance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armure (id INT AUTO_INCREMENT NOT NULL, endurance_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, enc INT NOT NULL, protection VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4ADFC535119EEBC1 (endurance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bouclier (id INT AUTO_INCREMENT NOT NULL, endurance_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, enc INT NOT NULL, esquive VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9F18E2AA119EEBC1 (endurance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, admiration INT DEFAULT NULL, atletique INT DEFAULT NULL, confiance INT DEFAULT NULL, exploration INT DEFAULT NULL, chant INT DEFAULT NULL, artisanat INT DEFAULT NULL, inspiration INT DEFAULT NULL, voyage INT DEFAULT NULL, perspicacite INT DEFAULT NULL, guerison INT DEFAULT NULL, courtoisie INT DEFAULT NULL, combat INT DEFAULT NULL, persuasion INT DEFAULT NULL, furtivite INT DEFAULT NULL, rechercher INT DEFAULT NULL, chasse INT DEFAULT NULL, enigme INT DEFAULT NULL, tradition INT DEFAULT NULL, UNIQUE INDEX UNIQ_94D4687F5E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_de_groupe (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, personalite INT DEFAULT NULL, mouvement INT DEFAULT NULL, perception INT DEFAULT NULL, survie INT DEFAULT NULL, coutume INT DEFAULT NULL, vocation INT DEFAULT NULL, avencement INT DEFAULT NULL, UNIQUE INDEX UNIQ_2BDEA8785E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE endurance (id INT AUTO_INCREMENT NOT NULL, maximum INT NOT NULL, fatigue INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espoir (id INT AUTO_INCREMENT NOT NULL, maximum INT NOT NULL, ombre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, nbr_place INT NOT NULL, UNIQUE INDEX UNIQ_4B98C21A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_personnage (groupe_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_D20779B17A45358C (groupe_id), INDEX IDX_D20779B15E315342 (personnage_id), PRIMARY KEY(groupe_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, vocation_id INT DEFAULT NULL, tableofyears_id INT DEFAULT NULL, espoir_id INT DEFAULT NULL, endurance_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, corps INT NOT NULL, esprit INT NOT NULL, standard_de_vie VARCHAR(255) NOT NULL, experience INT DEFAULT NULL, courage INT NOT NULL, sagesse INT NOT NULL, dommage INT NOT NULL, parade INT NOT NULL, armure INT NOT NULL, camaraderie INT NOT NULL, prestige INT NOT NULL, origine VARCHAR(255) NOT NULL, classe VARCHAR(255) NOT NULL, avantage_culturel VARCHAR(255) NOT NULL, background VARCHAR(255) NOT NULL, specialite LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', particularite LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_6AEA486D4A14BDC1 (vocation_id), INDEX IDX_6AEA486DED6194BB (tableofyears_id), UNIQUE INDEX UNIQ_6AEA486DBFC4A9B (espoir_id), UNIQUE INDEX UNIQ_6AEA486D119EEBC1 (endurance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recompense (id INT AUTO_INCREMENT NOT NULL, objet VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recompense_personnage (recompense_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_DC68AF34D714096 (recompense_id), INDEX IDX_DC68AF35E315342 (personnage_id), PRIMARY KEY(recompense_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE table_of_years (id INT AUTO_INCREMENT NOT NULL, year INT DEFAULT NULL, evenement VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tresor (id INT AUTO_INCREMENT NOT NULL, endurance_id INT DEFAULT NULL, enc INT NOT NULL, piece INT NOT NULL, INDEX IDX_A442EB9B119EEBC1 (endurance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertu (id INT AUTO_INCREMENT NOT NULL, caractere VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vertu_personnage (vertu_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_BE76F42759CA8275 (vertu_id), INDEX IDX_BE76F4275E315342 (personnage_id), PRIMARY KEY(vertu_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vocation (id INT AUTO_INCREMENT NOT NULL, indication VARCHAR(255) NOT NULL, part_dombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme ADD CONSTRAINT FK_18207379119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE armure ADD CONSTRAINT FK_4ADFC535119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE bouclier ADD CONSTRAINT FK_9F18E2AA119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE competence_de_groupe ADD CONSTRAINT FK_2BDEA8785E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE groupe_personnage ADD CONSTRAINT FK_D20779B17A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_personnage ADD CONSTRAINT FK_D20779B15E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D4A14BDC1 FOREIGN KEY (vocation_id) REFERENCES vocation (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DED6194BB FOREIGN KEY (tableofyears_id) REFERENCES table_of_years (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DBFC4A9B FOREIGN KEY (espoir_id) REFERENCES espoir (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE recompense_personnage ADD CONSTRAINT FK_DC68AF34D714096 FOREIGN KEY (recompense_id) REFERENCES recompense (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recompense_personnage ADD CONSTRAINT FK_DC68AF35E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tresor ADD CONSTRAINT FK_A442EB9B119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE vertu_personnage ADD CONSTRAINT FK_BE76F42759CA8275 FOREIGN KEY (vertu_id) REFERENCES vertu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vertu_personnage ADD CONSTRAINT FK_BE76F4275E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme DROP FOREIGN KEY FK_18207379119EEBC1');
        $this->addSql('ALTER TABLE armure DROP FOREIGN KEY FK_4ADFC535119EEBC1');
        $this->addSql('ALTER TABLE bouclier DROP FOREIGN KEY FK_9F18E2AA119EEBC1');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D119EEBC1');
        $this->addSql('ALTER TABLE tresor DROP FOREIGN KEY FK_A442EB9B119EEBC1');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DBFC4A9B');
        $this->addSql('ALTER TABLE groupe_personnage DROP FOREIGN KEY FK_D20779B17A45358C');
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F5E315342');
        $this->addSql('ALTER TABLE competence_de_groupe DROP FOREIGN KEY FK_2BDEA8785E315342');
        $this->addSql('ALTER TABLE groupe_personnage DROP FOREIGN KEY FK_D20779B15E315342');
        $this->addSql('ALTER TABLE recompense_personnage DROP FOREIGN KEY FK_DC68AF35E315342');
        $this->addSql('ALTER TABLE vertu_personnage DROP FOREIGN KEY FK_BE76F4275E315342');
        $this->addSql('ALTER TABLE recompense_personnage DROP FOREIGN KEY FK_DC68AF34D714096');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DED6194BB');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21A76ED395');
        $this->addSql('ALTER TABLE vertu_personnage DROP FOREIGN KEY FK_BE76F42759CA8275');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D4A14BDC1');
        $this->addSql('DROP TABLE arme');
        $this->addSql('DROP TABLE armure');
        $this->addSql('DROP TABLE bouclier');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE competence_de_groupe');
        $this->addSql('DROP TABLE endurance');
        $this->addSql('DROP TABLE espoir');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE groupe_personnage');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE recompense');
        $this->addSql('DROP TABLE recompense_personnage');
        $this->addSql('DROP TABLE table_of_years');
        $this->addSql('DROP TABLE tresor');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vertu');
        $this->addSql('DROP TABLE vertu_personnage');
        $this->addSql('DROP TABLE vocation');
    }
}
