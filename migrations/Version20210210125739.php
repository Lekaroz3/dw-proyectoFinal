<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210125739 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pedidos (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, detalles VARCHAR(255) NOT NULL, INDEX IDX_6716CCAADB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nombre_usuario VARCHAR(255) NOT NULL, contra VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zapa_pedidos (id INT AUTO_INCREMENT NOT NULL, zapatilla_id INT DEFAULT NULL, pedido_id INT DEFAULT NULL, cantidad INT NOT NULL, INDEX IDX_EFDF04C396F9B908 (zapatilla_id), INDEX IDX_EFDF04C34854653A (pedido_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zapatilla (id INT AUTO_INCREMENT NOT NULL, categoria_id INT DEFAULT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(500) NOT NULL, precio INT NOT NULL, url_imagen VARCHAR(500) NOT NULL, INDEX IDX_484948B33397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pedidos ADD CONSTRAINT FK_6716CCAADB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE zapa_pedidos ADD CONSTRAINT FK_EFDF04C396F9B908 FOREIGN KEY (zapatilla_id) REFERENCES zapatilla (id)');
        $this->addSql('ALTER TABLE zapa_pedidos ADD CONSTRAINT FK_EFDF04C34854653A FOREIGN KEY (pedido_id) REFERENCES pedidos (id)');
        $this->addSql('ALTER TABLE zapatilla ADD CONSTRAINT FK_484948B33397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zapatilla DROP FOREIGN KEY FK_484948B33397707A');
        $this->addSql('ALTER TABLE zapa_pedidos DROP FOREIGN KEY FK_EFDF04C34854653A');
        $this->addSql('ALTER TABLE pedidos DROP FOREIGN KEY FK_6716CCAADB38439E');
        $this->addSql('ALTER TABLE zapa_pedidos DROP FOREIGN KEY FK_EFDF04C396F9B908');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE pedidos');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE zapa_pedidos');
        $this->addSql('DROP TABLE zapatilla');
    }
}
