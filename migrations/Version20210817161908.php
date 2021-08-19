<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210817161908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configurable_product (id INT AUTO_INCREMENT NOT NULL, phone_id INT NOT NULL, memory_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_A07DD8023B7323CB (phone_id), INDEX IDX_A07DD802CCC80CB3 (memory_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memory (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, value VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operating_system (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, size_id INT NOT NULL, operating_system_id INT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, year DATE NOT NULL, INDEX IDX_444F97DD44F5D008 (brand_id), INDEX IDX_444F97DD498DA827 (size_id), INDEX IDX_444F97DDA391D4AD (operating_system_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_has_color (id INT AUTO_INCREMENT NOT NULL, phone_id INT NOT NULL, color_id INT NOT NULL, main TINYINT(1) NOT NULL, INDEX IDX_94A1536F3B7323CB (phone_id), INDEX IDX_94A1536F7ADA1FB5 (color_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_has_picture (id INT AUTO_INCREMENT NOT NULL, phone_id INT NOT NULL, picture_id INT NOT NULL, main TINYINT(1) NOT NULL, INDEX IDX_F1674B5F3B7323CB (phone_id), INDEX IDX_F1674B5FEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, path VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size (id INT AUTO_INCREMENT NOT NULL, width_px VARCHAR(50) NOT NULL, height_px VARCHAR(50) NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, shop_id INT NOT NULL, username VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, INDEX IDX_8D93D6494D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE configurable_product ADD CONSTRAINT FK_A07DD8023B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('ALTER TABLE configurable_product ADD CONSTRAINT FK_A07DD802CCC80CB3 FOREIGN KEY (memory_id) REFERENCES memory (id)');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DD498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('ALTER TABLE phone ADD CONSTRAINT FK_444F97DDA391D4AD FOREIGN KEY (operating_system_id) REFERENCES operating_system (id)');
        $this->addSql('ALTER TABLE phone_has_color ADD CONSTRAINT FK_94A1536F3B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('ALTER TABLE phone_has_color ADD CONSTRAINT FK_94A1536F7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE phone_has_picture ADD CONSTRAINT FK_F1674B5F3B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id)');
        $this->addSql('ALTER TABLE phone_has_picture ADD CONSTRAINT FK_F1674B5FEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DD44F5D008');
        $this->addSql('ALTER TABLE phone_has_color DROP FOREIGN KEY FK_94A1536F7ADA1FB5');
        $this->addSql('ALTER TABLE configurable_product DROP FOREIGN KEY FK_A07DD802CCC80CB3');
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DDA391D4AD');
        $this->addSql('ALTER TABLE configurable_product DROP FOREIGN KEY FK_A07DD8023B7323CB');
        $this->addSql('ALTER TABLE phone_has_color DROP FOREIGN KEY FK_94A1536F3B7323CB');
        $this->addSql('ALTER TABLE phone_has_picture DROP FOREIGN KEY FK_F1674B5F3B7323CB');
        $this->addSql('ALTER TABLE phone_has_picture DROP FOREIGN KEY FK_F1674B5FEE45BDBF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494D16C4DD');
        $this->addSql('ALTER TABLE phone DROP FOREIGN KEY FK_444F97DD498DA827');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE configurable_product');
        $this->addSql('DROP TABLE memory');
        $this->addSql('DROP TABLE operating_system');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE phone_has_color');
        $this->addSql('DROP TABLE phone_has_picture');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE shop');
        $this->addSql('DROP TABLE size');
        $this->addSql('DROP TABLE user');
    }
}
