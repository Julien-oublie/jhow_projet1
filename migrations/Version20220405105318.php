<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405105318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partie_user (partie_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D4C3EF8E075F7A4 (partie_id), INDEX IDX_D4C3EF8A76ED395 (user_id), PRIMARY KEY(partie_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partie_personnage (partie_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_3CDAB6ECE075F7A4 (partie_id), INDEX IDX_3CDAB6EC5E315342 (personnage_id), PRIMARY KEY(partie_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partie_user ADD CONSTRAINT FK_D4C3EF8E075F7A4 FOREIGN KEY (partie_id) REFERENCES partie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partie_user ADD CONSTRAINT FK_D4C3EF8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partie_personnage ADD CONSTRAINT FK_3CDAB6ECE075F7A4 FOREIGN KEY (partie_id) REFERENCES partie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partie_personnage ADD CONSTRAINT FK_3CDAB6EC5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE armes');
        $this->addSql('ALTER TABLE personnage ADD armes VARCHAR(255) NOT NULL, CHANGE part_ombre part_ombre VARCHAR(255) NOT NULL, CHANGE traits traits VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partie_user DROP FOREIGN KEY FK_D4C3EF8E075F7A4');
        $this->addSql('ALTER TABLE partie_personnage DROP FOREIGN KEY FK_3CDAB6ECE075F7A4');
        $this->addSql('CREATE TABLE armes (id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, arme VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, competence INT NOT NULL, INDEX IDX_32CF26E05E315342 (personnage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE armes ADD CONSTRAINT FK_32CF26E05E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id)');
        $this->addSql('DROP TABLE partie');
        $this->addSql('DROP TABLE partie_user');
        $this->addSql('DROP TABLE partie_personnage');
        $this->addSql('ALTER TABLE personnage DROP armes, CHANGE part_ombre part_ombre VARCHAR(255) DEFAULT NULL, CHANGE traits traits VARCHAR(255) DEFAULT NULL');
    }
}
