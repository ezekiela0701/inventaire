<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201029111413 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tbase (id INT AUTO_INCREMENT NOT NULL, code_complet_id INT NOT NULL, emplacement_id INT NOT NULL, date_reception DATE NOT NULL, designation VARCHAR(255) NOT NULL, numeros_serie VARCHAR(255) NOT NULL, identification VARCHAR(255) NOT NULL, date_affectation DATE NOT NULL, INDEX IDX_2B80906F86111D22 (code_complet_id), INDEX IDX_2B80906FC4598A51 (emplacement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tcode (id INT AUTO_INCREMENT NOT NULL, code_complet VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE templacement (id INT AUTO_INCREMENT NOT NULL, emplacement VARCHAR(255) NOT NULL, note LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tbase ADD CONSTRAINT FK_2B80906F86111D22 FOREIGN KEY (code_complet_id) REFERENCES tcode (id)');
        $this->addSql('ALTER TABLE tbase ADD CONSTRAINT FK_2B80906FC4598A51 FOREIGN KEY (emplacement_id) REFERENCES templacement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tbase DROP FOREIGN KEY FK_2B80906F86111D22');
        $this->addSql('ALTER TABLE tbase DROP FOREIGN KEY FK_2B80906FC4598A51');
        $this->addSql('DROP TABLE tbase');
        $this->addSql('DROP TABLE tcode');
        $this->addSql('DROP TABLE templacement');
    }
}
