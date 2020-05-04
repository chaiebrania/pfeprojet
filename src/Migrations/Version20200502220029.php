<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200502220029 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE intervention CHANGE persones_id persones_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE norme ADD instrument_specifique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE norme ADD CONSTRAINT FK_399BE567BA33B4FA FOREIGN KEY (instrument_specifique_id) REFERENCES instrument_specifique (id)');
        $this->addSql('CREATE INDEX IDX_399BE567BA33B4FA ON norme (instrument_specifique_id)');
        $this->addSql('ALTER TABLE normeinstrument CHANGE norme_id norme_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE intervention CHANGE persones_id persones_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE norme DROP FOREIGN KEY FK_399BE567BA33B4FA');
        $this->addSql('DROP INDEX IDX_399BE567BA33B4FA ON norme');
        $this->addSql('ALTER TABLE norme DROP instrument_specifique_id');
        $this->addSql('ALTER TABLE normeinstrument CHANGE norme_id norme_id INT DEFAULT NULL');
    }
}
