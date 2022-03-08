<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307234629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, contenu TINYTEXT DEFAULT NULL, imagearticle VARCHAR(255) DEFAULT NULL, datecreation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_keywords (article_id INT NOT NULL, keywords_id INT NOT NULL, INDEX IDX_FFB741357294869C (article_id), INDEX IDX_FFB741356205D0B8 (keywords_id), PRIMARY KEY(article_id, keywords_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (idClient INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, prenom VARCHAR(11) NOT NULL, age INT NOT NULL, adresse VARCHAR(30) NOT NULL, mail VARCHAR(30) NOT NULL, phone INT NOT NULL, login VARCHAR(20) NOT NULL, mdp VARCHAR(20) NOT NULL, image VARCHAR(30) NOT NULL, PRIMARY KEY(idClient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, client_id INT DEFAULT NULL, contenu TINYTEXT DEFAULT NULL, INDEX IDX_67F068BC7294869C (article_id), INDEX IDX_67F068BC19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(10) NOT NULL, ref VARCHAR(30) NOT NULL, nom VARCHAR(10) NOT NULL, prix DOUBLE PRECISION NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, etat VARCHAR(10) NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords (id INT AUTO_INCREMENT NOT NULL, words VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, method VARCHAR(20) NOT NULL, adresseclient VARCHAR(20) NOT NULL, etat VARCHAR(255) NOT NULL, idClient INT DEFAULT NULL, idProd INT DEFAULT NULL, cinLivreur INT DEFAULT NULL, INDEX fkey_livreur (cinLivreur), INDEX fkey1000 (idClient), INDEX fkey1001 (idProd), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livreur (cin INT NOT NULL, name VARCHAR(20) NOT NULL, prenom VARCHAR(30) NOT NULL, rating INT NOT NULL, date_naissance DATE NOT NULL, image VARCHAR(30) NOT NULL, zone VARCHAR(255) NOT NULL, tel VARCHAR(12) NOT NULL, UNIQUE INDEX cin (cin), PRIMARY KEY(cin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, idprod_id INT DEFAULT NULL, date_fin DATE NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, Date_debut DATE NOT NULL, INDEX IDX_C11D7DD1DECC6D1B (idprod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ratings (id INT AUTO_INCREMENT NOT NULL, date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (idRec INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, description TEXT NOT NULL, etat VARCHAR(30) NOT NULL, method_remb VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, idClient INT DEFAULT NULL, idRep INT DEFAULT NULL, INDEX fkey2 (idRep), INDEX fkey1 (idClient), PRIMARY KEY(idRec)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reparation (idRep INT AUTO_INCREMENT NOT NULL, delai DATE NOT NULL, PRIMARY KEY(idRep)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsors (id INT AUTO_INCREMENT NOT NULL, tournoi_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, INDEX IDX_9A31550FF607770A (tournoi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, nbparticipant INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_18AFD9DF19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_keywords ADD CONSTRAINT FK_FFB741357294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_keywords ADD CONSTRAINT FK_FFB741356205D0B8 FOREIGN KEY (keywords_id) REFERENCES keywords (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC19EB6921 FOREIGN KEY (client_id) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FA455ACCF FOREIGN KEY (idClient) REFERENCES client (idClient) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FC6494F09 FOREIGN KEY (idProd) REFERENCES element (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5550FAFC FOREIGN KEY (cinLivreur) REFERENCES livreur (cin) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1DECC6D1B FOREIGN KEY (idprod_id) REFERENCES element (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A455ACCF FOREIGN KEY (idClient) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C1F39675 FOREIGN KEY (idRep) REFERENCES reparation (idRep) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sponsors ADD CONSTRAINT FK_9A31550FF607770A FOREIGN KEY (tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF19EB6921 FOREIGN KEY (client_id) REFERENCES client (idClient)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_keywords DROP FOREIGN KEY FK_FFB741357294869C');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC7294869C');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC19EB6921');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FA455ACCF');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A455ACCF');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF19EB6921');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FC6494F09');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1DECC6D1B');
        $this->addSql('ALTER TABLE article_keywords DROP FOREIGN KEY FK_FFB741356205D0B8');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5550FAFC');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C1F39675');
        $this->addSql('ALTER TABLE sponsors DROP FOREIGN KEY FK_9A31550FF607770A');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_keywords');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE keywords');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE livreur');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reparation');
        $this->addSql('DROP TABLE sponsors');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE user');
    }
}
