<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220404131128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage CHANGE admiration admiration INT NOT NULL, CHANGE athletisme athletisme INT NOT NULL, CHANGE conscience conscience INT NOT NULL, CHANGE exploration exploration INT NOT NULL, CHANGE chant chant INT NOT NULL, CHANGE artisanat artisanat INT NOT NULL, CHANGE inspiration inspiration INT NOT NULL, CHANGE voyage voyage INT NOT NULL, CHANGE perspicacite perspicacite INT NOT NULL, CHANGE guerison guerison INT NOT NULL, CHANGE courtoisie courtoisie INT NOT NULL, CHANGE combat combat INT NOT NULL, CHANGE persuasion persuasion INT NOT NULL, CHANGE furtivite furtivite INT NOT NULL, CHANGE fouille fouille INT NOT NULL, CHANGE chasse chasse INT NOT NULL, CHANGE enigmes enigmes INT NOT NULL, CHANGE conaissances conaissances INT NOT NULL, CHANGE competences_favorites competences_favorites_vocation LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnage CHANGE admiration admiration VARCHAR(255) NOT NULL, CHANGE athletisme athletisme VARCHAR(255) NOT NULL, CHANGE conscience conscience VARCHAR(255) NOT NULL, CHANGE exploration exploration VARCHAR(255) NOT NULL, CHANGE chant chant VARCHAR(255) NOT NULL, CHANGE artisanat artisanat VARCHAR(255) NOT NULL, CHANGE inspiration inspiration VARCHAR(255) NOT NULL, CHANGE voyage voyage VARCHAR(255) NOT NULL, CHANGE perspicacite perspicacite VARCHAR(255) NOT NULL, CHANGE guerison guerison VARCHAR(255) NOT NULL, CHANGE courtoisie courtoisie VARCHAR(255) NOT NULL, CHANGE combat combat VARCHAR(255) NOT NULL, CHANGE persuasion persuasion VARCHAR(255) NOT NULL, CHANGE furtivite furtivite VARCHAR(255) NOT NULL, CHANGE fouille fouille VARCHAR(255) NOT NULL, CHANGE chasse chasse VARCHAR(255) NOT NULL, CHANGE enigmes enigmes VARCHAR(255) NOT NULL, CHANGE conaissances conaissances VARCHAR(255) NOT NULL, CHANGE competences_favorites_vocation competences_favorites LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }
}
