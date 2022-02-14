<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214105124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage ADD admiration VARCHAR(255) NOT NULL, ADD athletisme VARCHAR(255) NOT NULL, ADD conscience VARCHAR(255) NOT NULL, ADD exploration VARCHAR(255) NOT NULL, ADD chant VARCHAR(255) NOT NULL, ADD artisanat VARCHAR(255) NOT NULL, ADD inspiration VARCHAR(255) NOT NULL, ADD voyage VARCHAR(255) NOT NULL, ADD perspicacite VARCHAR(255) NOT NULL, ADD guerison VARCHAR(255) NOT NULL, ADD courtoisie VARCHAR(255) NOT NULL, ADD combat VARCHAR(255) NOT NULL, ADD persuasion VARCHAR(255) NOT NULL, ADD furtivite VARCHAR(255) NOT NULL, ADD fouille VARCHAR(255) NOT NULL, ADD chasse VARCHAR(255) NOT NULL, ADD enigmes VARCHAR(255) NOT NULL, ADD conaissances VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE groupe groupe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE notes notes VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE armure CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE protection protection VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE bouclier CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE esquive esquive VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE groupe CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE personnage DROP admiration, DROP athletisme, DROP conscience, DROP exploration, DROP chant, DROP artisanat, DROP inspiration, DROP voyage, DROP perspicacite, DROP guerison, DROP courtoisie, DROP combat, DROP persuasion, DROP furtivite, DROP fouille, DROP chasse, DROP enigmes, DROP conaissances, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE standard_de_vie standard_de_vie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE origine origine VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE classe classe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE avantage_culturel avantage_culturel VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE background background VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE specialite specialite LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', CHANGE particularite particularite LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE recompense CHANGE objet objet VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE table_of_years CHANGE evenement evenement VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vertu CHANGE caractere caractere VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vocation CHANGE indication indication VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE part_dombre part_dombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
