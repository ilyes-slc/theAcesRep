<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220220215211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE article CHANGE idarticle idarticle INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE client CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE commentaire CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE idarticle idarticle INT DEFAULT NULL, CHANGE nomcl nomcl VARCHAR(10) DEFAULT NULL, CHANGE imgCl imgCl VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE keywords CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE livraison ADD etat VARCHAR(255) NOT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE livreur CHANGE cin cin INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE promotion CHANGE idProd idProd INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ratings CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE idar idar INT DEFAULT NULL, CHANGE imgClient imgClient VARCHAR(30) DEFAULT NULL, CHANGE nomClient nomClient VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE idRec idRec INT AUTO_INCREMENT NOT NULL, CHANGE idRep idRep INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reparation CHANGE idRep idRep INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE responsable CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE sponsors CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE tournoi CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE idSponsor idSponsor INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE champ_de_gestion champ_de_gestion VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE article CHANGE idarticle idarticle INT NOT NULL, CHANGE contenu contenu VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE imagearticle imagearticle VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE titre titre VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE avis CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE imgClient imgClient VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nomClient nomClient VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(11) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE commentaire CHANGE id id INT NOT NULL, CHANGE idarticle idarticle INT NOT NULL, CHANGE nomcl nomcl VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE contenu contenu TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE imgCl imgCl VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE element CHANGE type type VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ref ref VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat etat VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE keywords CHANGE id id INT NOT NULL, CHANGE games games VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE element element VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE tournoi tournoi VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE livreurs livreurs VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE livraison DROP etat, CHANGE id id INT NOT NULL, CHANGE method method VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresseclient adresseclient VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE livreur CHANGE cin cin INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE produit CHANGE id id INT NOT NULL, CHANGE type type VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ref ref VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE nom nom VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE etat etat VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE promotion CHANGE idProd idProd INT NOT NULL');
        $this->addSql('ALTER TABLE ratings CHANGE id id INT NOT NULL, CHANGE idar idar INT NOT NULL, CHANGE nomClient nomClient VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE imgClient imgClient VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE reclamation CHANGE idRec idRec INT NOT NULL, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE etat etat VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE idRep idRep INT NOT NULL');
        $this->addSql('ALTER TABLE reparation CHANGE idRep idRep INT NOT NULL');
        $this->addSql('ALTER TABLE responsable CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE champ_de_gestion champ_de_gestion VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE sponsors CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE logo logo VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE tournoi CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE idSponsor idSponsor INT NOT NULL');
    }
}
