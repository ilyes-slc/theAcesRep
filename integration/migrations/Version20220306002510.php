<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220306002510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (idClient INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, prenom VARCHAR(11) NOT NULL, age INT NOT NULL, adresse VARCHAR(30) NOT NULL, mail VARCHAR(30) NOT NULL, phone INT NOT NULL, login VARCHAR(20) NOT NULL, mdp VARCHAR(20) NOT NULL, image VARCHAR(30) NOT NULL, UNIQUE INDEX name (name), UNIQUE INDEX image (image), UNIQUE INDEX adresse (adresse), PRIMARY KEY(idClient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(10) NOT NULL, ref VARCHAR(30) NOT NULL, nom VARCHAR(10) NOT NULL, prix DOUBLE PRECISION NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, etat VARCHAR(10) NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, idprod_id INT DEFAULT NULL, date_fin DATE NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, Date_debut DATE NOT NULL, INDEX IDX_C11D7DD1DECC6D1B (idprod_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (idRec INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, description TEXT NOT NULL, etat VARCHAR(30) NOT NULL, method_remb VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, idClient INT DEFAULT NULL, idRep INT DEFAULT NULL, INDEX fkey2 (idRep), INDEX fkey1 (idClient), PRIMARY KEY(idRec)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reparation (idRep INT AUTO_INCREMENT NOT NULL, delai DATE NOT NULL, PRIMARY KEY(idRep)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1DECC6D1B FOREIGN KEY (idprod_id) REFERENCES element (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A455ACCF FOREIGN KEY (idClient) REFERENCES client (idClient)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C1F39675 FOREIGN KEY (idRep) REFERENCES reparation (idRep) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A455ACCF');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1DECC6D1B');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C1F39675');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reparation');
    }
}
