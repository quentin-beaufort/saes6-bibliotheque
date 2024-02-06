<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240206102702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent ADD roles JSON NOT NULL COMMENT \'(DC2Type:json)\', ADD password VARCHAR(255) NOT NULL, CHANGE date_naiss date_naiss DATE DEFAULT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE num_tel num_tel VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90D3F060E7927C74 ON adherent (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_90D3F060E7927C74 ON adherent');
        $this->addSql('ALTER TABLE adherent DROP roles, DROP password, CHANGE email email VARCHAR(255) NOT NULL, CHANGE date_naiss date_naiss DATE NOT NULL, CHANGE num_tel num_tel VARCHAR(255) NOT NULL');
    }
}
