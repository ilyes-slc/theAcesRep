<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220228212946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, prenom VARCHAR(30) NOT NULL, age INT NOT NULL, adresse VARCHAR(20) NOT NULL, mail VARCHAR(20) NOT NULL, phone INT NOT NULL, champ_de_gestion VARCHAR(20) NOT NULL, login VARCHAR(20) NOT NULL, mdp VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (idarticle INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(50) NOT NULL, date_creation DATE NOT NULL, imagearticle VARCHAR(30) NOT NULL, titre VARCHAR(30) NOT NULL, PRIMARY KEY(idarticle)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (idClient INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, prenom VARCHAR(11) NOT NULL, age INT NOT NULL, adresse VARCHAR(30) NOT NULL, mail VARCHAR(30) NOT NULL, phone INT NOT NULL, login VARCHAR(20) NOT NULL, mdp VARCHAR(20) NOT NULL, image VARCHAR(30) NOT NULL, UNIQUE INDEX adresse (adresse), UNIQUE INDEX name (name), UNIQUE INDEX image (image), PRIMARY KEY(idClient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, nomcl VARCHAR(10) DEFAULT NULL, idarticle INT DEFAULT NULL, contenu TEXT NOT NULL, date_commentaire DATETIME NOT NULL, imgCl VARCHAR(30) DEFAULT NULL, idCl INT DEFAULT NULL, INDEX fkey48 (nomcl), INDEX fkey60 (idCl), INDEX fkey45 (idarticle), INDEX fkey47 (imgCl), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(10) NOT NULL, ref VARCHAR(30) NOT NULL, nom VARCHAR(10) NOT NULL, prix DOUBLE PRECISION NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, etat VARCHAR(10) NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords (id INT AUTO_INCREMENT NOT NULL, games VARCHAR(10) NOT NULL, element VARCHAR(10) NOT NULL, tournoi VARCHAR(10) NOT NULL, livreurs VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, method VARCHAR(20) NOT NULL, idProd INT DEFAULT NULL, idClient INT DEFAULT NULL, adresseClient VARCHAR(30) DEFAULT NULL, cinLivreur INT DEFAULT NULL, INDEX fkey7 (adresseClient), INDEX fkey5 (idClient), INDEX fkey6 (idProd), INDEX fkey4 (cinLivreur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livreur (cin INT AUTO_INCREMENT NOT NULL, idrating INT DEFAULT NULL, name VARCHAR(20) NOT NULL, prenom VARCHAR(30) NOT NULL, rating INT NOT NULL, date_naissance DATE NOT NULL, image VARCHAR(30) NOT NULL, INDEX idrating (idrating), UNIQUE INDEX cin (cin), PRIMARY KEY(cin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(10) NOT NULL, ref VARCHAR(30) NOT NULL, nom VARCHAR(10) NOT NULL, prix DOUBLE PRECISION NOT NULL, description TEXT NOT NULL, image VARCHAR(30) NOT NULL, etat VARCHAR(10) NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, idprod_id INT DEFAULT NULL, date_fin DATE NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, Date_debut DATE NOT NULL, INDEX IDX_C11D7DD1DECC6D1B (idprod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ratings (id INT AUTO_INCREMENT NOT NULL, idar INT DEFAULT NULL, idcli INT DEFAULT NULL, date DATE NOT NULL, imgClient VARCHAR(30) DEFAULT NULL, nomClient VARCHAR(10) DEFAULT NULL, INDEX fkey77 (idcli), INDEX fkey33 (nomClient), INDEX fkey44 (imgClient), INDEX fkey46 (idar), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (idRec INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, description TEXT NOT NULL, etat VARCHAR(30) NOT NULL, idRep INT DEFAULT NULL, idClient INT DEFAULT NULL, INDEX fkey1 (idClient), INDEX fkey2 (idRep), PRIMARY KEY(idRec)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reparation (idRep INT AUTO_INCREMENT NOT NULL, delai DATE NOT NULL, PRIMARY KEY(idRep)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, prenom VARCHAR(30) NOT NULL, age INT NOT NULL, adresse VARCHAR(20) NOT NULL, mail VARCHAR(20) NOT NULL, phone INT NOT NULL, champ_de_gestion VARCHAR(20) NOT NULL, login VARCHAR(20) NOT NULL, mdp VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sponsors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, logo VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, Date_Debut DATE NOT NULL, Date_Fin DATE NOT NULL, description TEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, image VARCHAR(30) NOT NULL, idSponsor INT DEFAULT NULL, INDEX fkey8 (idSponsor), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC9BE9400 FOREIGN KEY (nomcl) REFERENCES client (name)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC498421EF FOREIGN KEY (imgCl) REFERENCES client (image)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCB7E435DC FOREIGN KEY (idCl) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCDD3E5C08 FOREIGN KEY (idarticle) REFERENCES article (idarticle)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FC6494F09 FOREIGN KEY (idProd) REFERENCES element (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FA455ACCF FOREIGN KEY (idClient) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F25909CC9 FOREIGN KEY (adresseClient) REFERENCES client (adresse)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5550FAFC FOREIGN KEY (cinLivreur) REFERENCES livreur (cin)');
        $this->addSql('ALTER TABLE livreur ADD CONSTRAINT FK_EB7A4E6DBC348B8E FOREIGN KEY (idrating) REFERENCES ratings (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1DECC6D1B FOREIGN KEY (idprod_id) REFERENCES element (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C9EA594E9F FOREIGN KEY (idar) REFERENCES article (idarticle)');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C9621C4490 FOREIGN KEY (imgClient) REFERENCES client (image)');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C951F30A5B FOREIGN KEY (idcli) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT FK_CEB607C9E028716A FOREIGN KEY (nomClient) REFERENCES client (name)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C1F39675 FOREIGN KEY (idRep) REFERENCES reparation (idRep)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A455ACCF FOREIGN KEY (idClient) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF9135A226 FOREIGN KEY (idSponsor) REFERENCES sponsors (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCDD3E5C08');
        $this->addSql('ALTER TABLE ratings DROP FOREIGN KEY FK_CEB607C9EA594E9F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCC9BE9400');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC498421EF');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCB7E435DC');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FA455ACCF');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F25909CC9');
        $this->addSql('ALTER TABLE ratings DROP FOREIGN KEY FK_CEB607C9621C4490');
        $this->addSql('ALTER TABLE ratings DROP FOREIGN KEY FK_CEB607C951F30A5B');
        $this->addSql('ALTER TABLE ratings DROP FOREIGN KEY FK_CEB607C9E028716A');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A455ACCF');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FC6494F09');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1DECC6D1B');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5550FAFC');
        $this->addSql('ALTER TABLE livreur DROP FOREIGN KEY FK_EB7A4E6DBC348B8E');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C1F39675');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF9135A226');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE keywords');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE livreur');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reparation');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE sponsors');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE user');
    }
}
