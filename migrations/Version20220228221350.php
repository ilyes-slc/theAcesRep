<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220228221350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournoi ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF19EB6921 FOREIGN KEY (client_id) REFERENCES client (idClient)');
        $this->addSql('CREATE INDEX IDX_18AFD9DF19EB6921 ON tournoi (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF19EB6921');
        $this->addSql('DROP INDEX IDX_18AFD9DF19EB6921 ON tournoi');
        $this->addSql('ALTER TABLE tournoi DROP client_id');
    }
}
