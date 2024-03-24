<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240324150002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) NOT NULL, telefone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, cnpj VARCHAR(18) NOT NULL, data_fundacao DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        // Adicionar um usuário administrador
        $this->addSql("INSERT INTO user (id, email, roles, password) VALUES (1, 'admin', '[\"ROLE_ADMIN\"]', '$2y$13$/C/cUoFrEYppT3tA8K0JF.DjhxKMn.jandD9WRGxGyUCijHDl02Ve')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE empresa');
        $this->addSql('DROP TABLE user');
        // Remover o usuário administrador adicionado
        $this->addSql("DELETE FROM user WHERE id = 1");
    }
}
