<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220227170731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client CHANGE name name VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(11) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE reclamation CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE etat etat VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE method_remb method_remb VARCHAR(255) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE target target VARCHAR(255) NOT NULL COLLATE `utf8mb4_general_ci`');
    }
}
