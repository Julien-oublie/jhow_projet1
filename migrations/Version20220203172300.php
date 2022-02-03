<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203172300 extends AbstractMigration
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
        $this->addSql('CREATE TABLE endurance (id INT AUTO_INCREMENT NOT NULL, maximum INT NOT NULL, fatigue INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espoir (id INT AUTO_INCREMENT NOT NULL, maximum INT NOT NULL, ombre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE table_of_years (id INT AUTO_INCREMENT NOT NULL, year INT DEFAULT NULL, evenement VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tresor (id INT AUTO_INCREMENT NOT NULL, endurance_id INT DEFAULT NULL, enc INT NOT NULL, piece INT NOT NULL, INDEX IDX_A442EB9B119EEBC1 (endurance_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme ADD CONSTRAINT FK_18207379119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE armure ADD CONSTRAINT FK_4ADFC535119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE bouclier ADD CONSTRAINT FK_9F18E2AA119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE tresor ADD CONSTRAINT FK_A442EB9B119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('ALTER TABLE personnage ADD vocation_id INT DEFAULT NULL, ADD tableofyears_id INT DEFAULT NULL, ADD espoir_id INT DEFAULT NULL, ADD endurance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D4A14BDC1 FOREIGN KEY (vocation_id) REFERENCES vocation (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DED6194BB FOREIGN KEY (tableofyears_id) REFERENCES table_of_years (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486DBFC4A9B FOREIGN KEY (espoir_id) REFERENCES espoir (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D119EEBC1 FOREIGN KEY (endurance_id) REFERENCES endurance (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AEA486D4A14BDC1 ON personnage (vocation_id)');
        $this->addSql('CREATE INDEX IDX_6AEA486DED6194BB ON personnage (tableofyears_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AEA486DBFC4A9B ON personnage (espoir_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AEA486D119EEBC1 ON personnage (endurance_id)');
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
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486DED6194BB');
        $this->addSql('DROP TABLE arme');
        $this->addSql('DROP TABLE armure');
        $this->addSql('DROP TABLE bouclier');
        $this->addSql('DROP TABLE endurance');
        $this->addSql('DROP TABLE espoir');
        $this->addSql('DROP TABLE table_of_years');
        $this->addSql('DROP TABLE tresor');
        $this->addSql('ALTER TABLE avantage_culturelle CHANGE benediction benediction VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE background CHANGE classe classe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE histoire histoire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE classe CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D4A14BDC1');
        $this->addSql('DROP INDEX UNIQ_6AEA486D4A14BDC1 ON personnage');
        $this->addSql('DROP INDEX IDX_6AEA486DED6194BB ON personnage');
        $this->addSql('DROP INDEX UNIQ_6AEA486DBFC4A9B ON personnage');
        $this->addSql('DROP INDEX UNIQ_6AEA486D119EEBC1 ON personnage');
        $this->addSql('ALTER TABLE personnage DROP vocation_id, DROP tableofyears_id, DROP espoir_id, DROP endurance_id, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE standard_de_vie standard_de_vie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE traits CHANGE specialite specialite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE particularite particularite VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vocation CHANGE indication indication VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE part_dombre part_dombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
