<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212155913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, nom_admin VARCHAR(255) NOT NULL, password_admin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, nom_rue VARCHAR(255) NOT NULL, num_rue INT NOT NULL, code_postal INT NOT NULL, gouvernorat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom_evenement VARCHAR(255) NOT NULL, date_evenement DATE NOT NULL, nombre_participant_evenement INT NOT NULL, prix_evenement DOUBLE PRECISION NOT NULL, type_evenement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, therapist_id INT DEFAULT NULL, id_utilisateur_id INT DEFAULT NULL, point INT NOT NULL, INDEX IDX_1ADAD7EB43E8B094 (therapist_id), UNIQUE INDEX UNIQ_1ADAD7EBC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE therapist (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT DEFAULT NULL, adresse_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_C3D632FC6EE5C49 (id_utilisateur_id), UNIQUE INDEX UNIQ_C3D632F4DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, prenom_utilisateur VARCHAR(255) NOT NULL, pseudo_utilisateur VARCHAR(255) NOT NULL, email_utilisateur VARCHAR(255) NOT NULL, password_utilisateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_evenement (utilisateur_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_6B889D32FB88E14F (utilisateur_id), INDEX IDX_6B889D32FD02F13 (evenement_id), PRIMARY KEY(utilisateur_id, evenement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB43E8B094 FOREIGN KEY (therapist_id) REFERENCES therapist (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE therapist ADD CONSTRAINT FK_C3D632FC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE therapist ADD CONSTRAINT FK_C3D632F4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE utilisateur_evenement ADD CONSTRAINT FK_6B889D32FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_evenement ADD CONSTRAINT FK_6B889D32FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB43E8B094');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBC6EE5C49');
        $this->addSql('ALTER TABLE therapist DROP FOREIGN KEY FK_C3D632FC6EE5C49');
        $this->addSql('ALTER TABLE therapist DROP FOREIGN KEY FK_C3D632F4DE7DC5C');
        $this->addSql('ALTER TABLE utilisateur_evenement DROP FOREIGN KEY FK_6B889D32FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_evenement DROP FOREIGN KEY FK_6B889D32FD02F13');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE therapist');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_evenement');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
