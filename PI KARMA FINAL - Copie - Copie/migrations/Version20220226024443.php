<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220226024443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) DEFAULT NULL, prenom VARCHAR(20) NOT NULL, age INT NOT NULL, adresse VARCHAR(30) NOT NULL, email VARCHAR(255) DEFAULT NULL, numero_tel INT NOT NULL, champ_de_gestion VARCHAR(30) NOT NULL, login VARCHAR(10) NOT NULL, mdp VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu TINYTEXT DEFAULT NULL, imagearticle VARCHAR(255) DEFAULT NULL, datecreation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_keywords (article_id INT NOT NULL, keywords_id INT NOT NULL, INDEX IDX_FFB741357294869C (article_id), INDEX IDX_FFB741356205D0B8 (keywords_id), PRIMARY KEY(article_id, keywords_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, age INT NOT NULL, adresse VARCHAR(30) NOT NULL, mail VARCHAR(30) NOT NULL, numero_tel INT NOT NULL, login VARCHAR(10) NOT NULL, mdp VARCHAR(10) NOT NULL, image_client VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, client_id INT DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, INDEX IDX_67F068BC7294869C (article_id), INDEX IDX_67F068BC19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, ref VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords (id INT AUTO_INCREMENT NOT NULL, words VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, idprod_id INT DEFAULT NULL, date_fin DATE NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, date_debut DATE NOT NULL, INDEX IDX_C11D7DD1DECC6D1B (idprod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ratings (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, reparation_id INT DEFAULT NULL, date DATE NOT NULL, description VARCHAR(255) NOT NULL, methode_remb VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_CE60640419EB6921 (client_id), UNIQUE INDEX UNIQ_CE60640497934BA (reparation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reparation (id INT AUTO_INCREMENT NOT NULL, delai DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsors (id INT AUTO_INCREMENT NOT NULL, tournoi_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9A31550FF607770A (tournoi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, sponsors_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, nbparticipant INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_18AFD9DFFB0F2BBC (sponsors_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi_client (tournoi_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_3117AAAAF607770A (tournoi_id), INDEX IDX_3117AAAA19EB6921 (client_id), PRIMARY KEY(tournoi_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_keywords ADD CONSTRAINT FK_FFB741357294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_keywords ADD CONSTRAINT FK_FFB741356205D0B8 FOREIGN KEY (keywords_id) REFERENCES keywords (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1DECC6D1B FOREIGN KEY (idprod_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640497934BA FOREIGN KEY (reparation_id) REFERENCES reparation (id)');
        $this->addSql('ALTER TABLE sponsors ADD CONSTRAINT FK_9A31550FF607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFFB0F2BBC FOREIGN KEY (sponsors_id) REFERENCES sponsors (id)');
        $this->addSql('ALTER TABLE tournoi_client ADD CONSTRAINT FK_3117AAAAF607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournoi_client ADD CONSTRAINT FK_3117AAAA19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_keywords DROP FOREIGN KEY FK_FFB741357294869C');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7294869C');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC19EB6921');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640419EB6921');
        $this->addSql('ALTER TABLE tournoi_client DROP FOREIGN KEY FK_3117AAAA19EB6921');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1DECC6D1B');
        $this->addSql('ALTER TABLE article_keywords DROP FOREIGN KEY FK_FFB741356205D0B8');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640497934BA');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFFB0F2BBC');
        $this->addSql('ALTER TABLE sponsors DROP FOREIGN KEY FK_9A31550FF607770A');
        $this->addSql('ALTER TABLE tournoi_client DROP FOREIGN KEY FK_3117AAAAF607770A');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_keywords');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE keywords');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reparation');
        $this->addSql('DROP TABLE sponsors');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE tournoi_client');
    }
}
