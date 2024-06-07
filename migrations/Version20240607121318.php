<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240607121318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, commands_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, weight INT DEFAULT NULL, image LONGBLOB DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_BFDD3168F7982617 (commands_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commands (id INT AUTO_INCREMENT NOT NULL, step VARCHAR(50) DEFAULT NULL, is_paid TINYINT(1) NOT NULL, command_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168F7982617 FOREIGN KEY (commands_id) REFERENCES commands (id)');
        $this->addSql('ALTER TABLE user ADD command_id INT DEFAULT NULL, ADD first_name VARCHAR(50) DEFAULT NULL, ADD last_name VARCHAR(50) DEFAULT NULL, ADD phone VARCHAR(15) DEFAULT NULL, ADD country VARCHAR(50) DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64933E1689A FOREIGN KEY (command_id) REFERENCES commands (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64933E1689A ON user (command_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64933E1689A');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168F7982617');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE commands');
        $this->addSql('DROP INDEX UNIQ_8D93D64933E1689A ON user');
        $this->addSql('ALTER TABLE user DROP command_id, DROP first_name, DROP last_name, DROP phone, DROP country, DROP created_at');
    }
}
