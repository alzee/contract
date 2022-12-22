<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221222075016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pay (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, contract_id INT NOT NULL, date DATE NOT NULL, method VARCHAR(255) NOT NULL, amount INT NOT NULL, total INT NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_FE8F223C979B1AD6 (company_id), INDEX IDX_FE8F223C2576E0FD (contract_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pay ADD CONSTRAINT FK_FE8F223C979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE pay ADD CONSTRAINT FK_FE8F223C2576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pay DROP FOREIGN KEY FK_FE8F223C979B1AD6');
        $this->addSql('ALTER TABLE pay DROP FOREIGN KEY FK_FE8F223C2576E0FD');
        $this->addSql('DROP TABLE pay');
    }
}
