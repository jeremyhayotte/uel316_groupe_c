<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227150018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite_categorie (actualite_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_EC878E9DA2843073 (actualite_id), INDEX IDX_EC878E9DBCF5E72D (categorie_id), PRIMARY KEY(actualite_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualite_categorie ADD CONSTRAINT FK_EC878E9DA2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_categorie ADD CONSTRAINT FK_EC878E9DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_actualite DROP FOREIGN KEY FK_F9CD8E90A2843073');
        $this->addSql('ALTER TABLE categorie_actualite DROP FOREIGN KEY FK_F9CD8E90BCF5E72D');
        $this->addSql('DROP TABLE categorie_actualite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_actualite (categorie_id INT NOT NULL, actualite_id INT NOT NULL, INDEX IDX_F9CD8E90BCF5E72D (categorie_id), INDEX IDX_F9CD8E90A2843073 (actualite_id), PRIMARY KEY(categorie_id, actualite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categorie_actualite ADD CONSTRAINT FK_F9CD8E90A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_actualite ADD CONSTRAINT FK_F9CD8E90BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_categorie DROP FOREIGN KEY FK_EC878E9DA2843073');
        $this->addSql('ALTER TABLE actualite_categorie DROP FOREIGN KEY FK_EC878E9DBCF5E72D');
        $this->addSql('DROP TABLE actualite_categorie');
    }
}
