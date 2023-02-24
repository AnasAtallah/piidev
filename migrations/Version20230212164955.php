<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212164955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite_centre (id INT AUTO_INCREMENT NOT NULL, planning_id INT DEFAULT NULL, jour_activite VARCHAR(255) NOT NULL, nom_activite VARCHAR(255) NOT NULL, contenu_activite VARCHAR(255) NOT NULL, heure_debut_activite TIME NOT NULL, heure_fin_activite TIME NOT NULL, nombre_participant_activite_max INT NOT NULL, INDEX IDX_BFC22E113D865311 (planning_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, pannier_id INT DEFAULT NULL, nom_article VARCHAR(255) NOT NULL, prix_article DOUBLE PRECISION NOT NULL, quantite_article INT NOT NULL, INDEX IDX_23A0E66BCF5E72D (categorie_id), INDEX IDX_23A0E66662C2FA2 (pannier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE centre (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, nom_centre VARCHAR(255) NOT NULL, capacite_centre INT NOT NULL, nombre_bloc_centre INT NOT NULL, UNIQUE INDEX UNIQ_C6A0EA754DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commantaire_publication (id INT AUTO_INCREMENT NOT NULL, publication_id INT DEFAULT NULL, date_commantaire DATE NOT NULL, contenu_commantaire VARCHAR(255) NOT NULL, INDEX IDX_AB54DB8938B217A7 (publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisateur (id INT AUTO_INCREMENT NOT NULL, adresse_id INT DEFAULT NULL, nom_organisateur VARCHAR(255) NOT NULL, num_tel_organisateur INT NOT NULL, pourcentage_revenu_organisateur DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_4BD76D444DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pannier (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_AED0E5EB19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_centre (id INT AUTO_INCREMENT NOT NULL, centre_id INT DEFAULT NULL, date_debut_planning DATE NOT NULL, date_fin_planning DATE NOT NULL, INDEX IDX_A681C81A463CD7C3 (centre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, date_publication DATE NOT NULL, contenu_publication VARCHAR(255) NOT NULL, INDEX IDX_AF3C6779FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reaction_publication (id INT AUTO_INCREMENT NOT NULL, publication_id INT DEFAULT NULL, utilisateur_id INT DEFAULT NULL, INDEX IDX_EC2A804F38B217A7 (publication_id), UNIQUE INDEX UNIQ_EC2A804FFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite_centre ADD CONSTRAINT FK_BFC22E113D865311 FOREIGN KEY (planning_id) REFERENCES planning_centre (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66662C2FA2 FOREIGN KEY (pannier_id) REFERENCES pannier (id)');
        $this->addSql('ALTER TABLE centre ADD CONSTRAINT FK_C6A0EA754DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commantaire_publication ADD CONSTRAINT FK_AB54DB8938B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE organisateur ADD CONSTRAINT FK_4BD76D444DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE pannier ADD CONSTRAINT FK_AED0E5EB19EB6921 FOREIGN KEY (client_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE planning_centre ADD CONSTRAINT FK_A681C81A463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reaction_publication ADD CONSTRAINT FK_EC2A804F38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE reaction_publication ADD CONSTRAINT FK_EC2A804FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE evenement ADD organisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681ED936B2FA FOREIGN KEY (organisateur_id) REFERENCES organisateur (id)');
        $this->addSql('CREATE INDEX IDX_B26681ED936B2FA ON evenement (organisateur_id)');
        $this->addSql('ALTER TABLE therapist ADD num_tel_therapist INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681ED936B2FA');
        $this->addSql('ALTER TABLE activite_centre DROP FOREIGN KEY FK_BFC22E113D865311');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66BCF5E72D');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66662C2FA2');
        $this->addSql('ALTER TABLE centre DROP FOREIGN KEY FK_C6A0EA754DE7DC5C');
        $this->addSql('ALTER TABLE commantaire_publication DROP FOREIGN KEY FK_AB54DB8938B217A7');
        $this->addSql('ALTER TABLE organisateur DROP FOREIGN KEY FK_4BD76D444DE7DC5C');
        $this->addSql('ALTER TABLE pannier DROP FOREIGN KEY FK_AED0E5EB19EB6921');
        $this->addSql('ALTER TABLE planning_centre DROP FOREIGN KEY FK_A681C81A463CD7C3');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779FB88E14F');
        $this->addSql('ALTER TABLE reaction_publication DROP FOREIGN KEY FK_EC2A804F38B217A7');
        $this->addSql('ALTER TABLE reaction_publication DROP FOREIGN KEY FK_EC2A804FFB88E14F');
        $this->addSql('DROP TABLE activite_centre');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE centre');
        $this->addSql('DROP TABLE commantaire_publication');
        $this->addSql('DROP TABLE organisateur');
        $this->addSql('DROP TABLE pannier');
        $this->addSql('DROP TABLE planning_centre');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE reaction_publication');
        $this->addSql('DROP INDEX IDX_B26681ED936B2FA ON evenement');
        $this->addSql('ALTER TABLE evenement DROP organisateur_id');
        $this->addSql('ALTER TABLE therapist DROP num_tel_therapist');
    }
}
