<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212165958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, nom_formation VARCHAR(255) NOT NULL, niveau_formation INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module_formation (id INT AUTO_INCREMENT NOT NULL, formation_id INT DEFAULT NULL, nom_formation VARCHAR(255) NOT NULL, prerequis_module VARCHAR(255) NOT NULL, duree_module VARCHAR(255) NOT NULL, contenu_module VARCHAR(255) NOT NULL, INDEX IDX_1A213E775200282E (formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE module_formation ADD CONSTRAINT FK_1A213E775200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE utilisateur ADD formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B35200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B35200282E ON utilisateur (formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B35200282E');
        $this->addSql('ALTER TABLE module_formation DROP FOREIGN KEY FK_1A213E775200282E');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE module_formation');
        $this->addSql('DROP INDEX IDX_1D1C63B35200282E ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP formation_id');
    }
}
