<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190509203330 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tb_enderecos (id INT AUTO_INCREMENT NOT NULL, cod_endereco INT NOT NULL, quadra_endereco VARCHAR(80) NOT NULL, numero_endereco DOUBLE PRECISION NOT NULL, NOT NULL, observacao VARCHAR(80), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE tb_contatos  (id INT AUTO_INCREMENT NOT NULL, cpf VARCHAR(11) NOT NULL, nome VARCHAR(150) NOT NULL,email VARCHAR(150) NOT NULL,  telefone DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE tb_enderecos ADD CONSTRAINT FK_4825983457215421 FOREIGN KEY (enderecos_id) REFERENCES tb_enderecos (id)');
        $this->addSql('ALTER TABLE tb_contatos ADD CONSTRAINT FK_17D6B0F9841DB1E7 FOREIGN KEY (contato_id) REFERENCES tb_contatos  (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tb_enderecos DROP FOREIGN KEY FK_4825983457215421');
        $this->addSql('ALTER TABLE tb_contatos DROP FOREIGN KEY FK_17D6B0F9841DB1E7');
        $this->addSql('DROP TABLE tb_enderecos');
        $this->addSql('DROP TABLE tb_contatos ');
    }
}
