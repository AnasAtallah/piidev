<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212172506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE despense (id INT AUTO_INCREMENT NOT NULL, libelle_despense VARCHAR(255) NOT NULL, montant_despense DOUBLE PRECISION NOT NULL, reduction_despense DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, nom_formateur VARCHAR(255) NOT NULL, prenom_formateur VARCHAR(255) NOT NULL, sexe_formateur VARCHAR(255) NOT NULL, email_formateur VARCHAR(255) NOT NULL, num_tel_formateur INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, date_debut_session DATE NOT NULL, date_fin_session DATE NOT NULL, nombre_participant_session INT NOT NULL, difficulte VARCHAR(255) NOT NULL, description_session VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur ADD session_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3613FECDF ON utilisateur (session_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3613FECDF');
        $this->addSql('DROP TABLE despense');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP INDEX IDX_1D1C63B3613FECDF ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP session_id');
    }
}
