<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200418184806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE instrument_generale (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE instrument_specifique ADD numero INT NOT NULL, ADD etendumin DOUBLE PRECISION NOT NULL, ADD etendumax DOUBLE PRECISION NOT NULL, ADD datemisenservice DATE NOT NULL, ADD frequencecalibrage INT NOT NULL');
        $this->addSql('ALTER TABLE instrument_specifique ADD CONSTRAINT FK_A6CB206A58A6581B FOREIGN KEY (instrument_generale_id) REFERENCES instrument_generale (id)');
        $this->addSql('CREATE INDEX IDX_A6CB206A58A6581B ON instrument_specifique (instrument_generale_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE instrument_specifique DROP FOREIGN KEY FK_A6CB206A58A6581B');
        $this->addSql('DROP TABLE instrument_generale');
        $this->addSql('DROP INDEX IDX_A6CB206A58A6581B ON instrument_specifique');
        $this->addSql('ALTER TABLE instrument_specifique DROP numero, DROP etendumin, DROP etendumax, DROP datemisenservice, DROP frequencecalibrage');
    }
}
