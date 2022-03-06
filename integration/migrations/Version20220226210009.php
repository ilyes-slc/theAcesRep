<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220226210009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY fkey45');
        $this->addSql('ALTER TABLE ratings DROP FOREIGN KEY fkey46');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY fkey4');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY fkey6');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY fkey3');
        $this->addSql('ALTER TABLE livreur DROP FOREIGN KEY livreur_ibfk_1');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY fkey8');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE keywords');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE livreur');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE ratings');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE sponsors');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('ALTER TABLE reclamation ADD method_remb VARCHAR(255) NOT NULL, ADD target VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A455ACCF FOREIGN KEY (idClient) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C1F39675 FOREIGN KEY (idRep) REFERENCES reparation (idRep)');
        $this->addSql('CREATE INDEX fkey1 ON reclamation (idClient)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, age INT NOT NULL, adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, mail VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, phone INT NOT NULL, champ_de_gestion VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, login VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, mdp VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article (idarticle INT NOT NULL, contenu VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_creation DATE NOT NULL, imagearticle VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, titre VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(idarticle)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire (id INT NOT NULL, idarticle INT NOT NULL, nomcl VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, idCl INT NOT NULL, date_commentaire DATETIME NOT NULL, imgCl VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fkey45 (idarticle), INDEX fkey47 (imgCl), INDEX fkey48 (nomcl), INDEX fkey60 (idCl), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE keywords (id INT NOT NULL, games VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, element VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, tournoi VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, livreurs VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, method VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, cinLivreur INT NOT NULL, idClient INT NOT NULL, idProd INT NOT NULL, adresseClient VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fkey4 (cinLivreur), INDEX fkey7 (adresseClient), INDEX fkey6 (idProd), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livreur (cin INT NOT NULL, idrating INT NOT NULL, name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, rating INT NOT NULL, date_naissance DATE NOT NULL, image VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX idrating (idrating), UNIQUE INDEX cin (cin), PRIMARY KEY(cin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (id INT NOT NULL, type VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, ref VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix DOUBLE PRECISION NOT NULL, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, image VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, etat VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE promotion (date_debut DATE NOT NULL, date_fin DATE NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, idProd INT NOT NULL, INDEX fkey3 (idProd), PRIMARY KEY(date_debut)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE ratings (id INT NOT NULL, idar INT NOT NULL, date DATE NOT NULL, imgClient VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nomClient VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, idcli INT NOT NULL, INDEX fkey44 (imgClient), INDEX fkey46 (idar), INDEX fkey77 (idcli), INDEX fkey33 (nomClient), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE responsable (id INT NOT NULL, name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, age INT NOT NULL, adresse VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, mail VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, phone INT NOT NULL, champ_de_gestion VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, login VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, mdp VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sponsors (id INT NOT NULL, name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, logo VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tournoi (id INT NOT NULL, name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Date_Debut DATE NOT NULL, Date_Fin DATE NOT NULL, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix DOUBLE PRECISION NOT NULL, idSponsor INT NOT NULL, image VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX fkey8 (idSponsor), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fkey45 FOREIGN KEY (idarticle) REFERENCES article (idarticle)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fkey48 FOREIGN KEY (nomcl) REFERENCES client (name)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fkey47 FOREIGN KEY (imgCl) REFERENCES client (image)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT fkey4 FOREIGN KEY (cinLivreur) REFERENCES livreur (cin)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT fkey7 FOREIGN KEY (adresseClient) REFERENCES client (adresse)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT fkey6 FOREIGN KEY (idProd) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE livreur ADD CONSTRAINT livreur_ibfk_1 FOREIGN KEY (idrating) REFERENCES ratings (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT fkey3 FOREIGN KEY (idProd) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT fkey33 FOREIGN KEY (nomClient) REFERENCES client (name)');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT fkey46 FOREIGN KEY (idar) REFERENCES article (idarticle)');
        $this->addSql('ALTER TABLE ratings ADD CONSTRAINT fkey44 FOREIGN KEY (imgClient) REFERENCES client (image)');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT fkey8 FOREIGN KEY (idSponsor) REFERENCES sponsors (id)');
        $this->addSql('ALTER TABLE client CHANGE name name VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(11) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A455ACCF');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C1F39675');
        $this->addSql('DROP INDEX fkey1 ON reclamation');
        $this->addSql('ALTER TABLE reclamation DROP method_remb, DROP target, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE etat etat VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
    }
}
