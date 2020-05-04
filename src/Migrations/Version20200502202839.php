<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200502202839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE intervention ADD persones_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intervention ADD CONSTRAINT FK_D11814ABA0B9E840 FOREIGN KEY (persones_id) REFERENCES persone (id)');
        $this->addSql('CREATE INDEX IDX_D11814ABA0B9E840 ON intervention (persones_id)');
        $this->addSql('ALTER TABLE normeinstrument CHANGE norme_id norme_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE intervention DROP FOREIGN KEY FK_D11814ABA0B9E840');
        $this->addSql('DROP INDEX IDX_D11814ABA0B9E840 ON intervention');
        $this->addSql('ALTER TABLE intervention DROP persones_id');
        $this->addSql('ALTER TABLE normeinstrument CHANGE norme_id norme_id INT DEFAULT NULL');
    }
}
