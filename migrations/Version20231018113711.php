<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018113711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bijou (id INT AUTO_INCREMENT NOT NULL, idcategorie_id INT NOT NULL, description VARCHAR(255) NOT NULL, prixvente INT NOT NULL, prixlocation INT NOT NULL, INDEX IDX_E4B4D794FA5A9824 (idcategorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, adresserue VARCHAR(255) NOT NULL, codepostal VARCHAR(10) NOT NULL, ville VARCHAR(255) NOT NULL, courriel VARCHAR(255) NOT NULL, telfixe VARCHAR(255) NOT NULL, telportable VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, idclient_id INT DEFAULT NULL, idbijou_id INT NOT NULL, datedebutlocation DATETIME NOT NULL, datefinlocation DATETIME NOT NULL, INDEX IDX_5E9E89CB67F0C0D4 (idclient_id), INDEX IDX_5E9E89CB34FBB9B8 (idbijou_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bijou ADD CONSTRAINT FK_E4B4D794FA5A9824 FOREIGN KEY (idcategorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB67F0C0D4 FOREIGN KEY (idclient_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB34FBB9B8 FOREIGN KEY (idbijou_id) REFERENCES bijou (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bijou DROP FOREIGN KEY FK_E4B4D794FA5A9824');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB67F0C0D4');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB34FBB9B8');
        $this->addSql('DROP TABLE bijou');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE location');
    }
}
