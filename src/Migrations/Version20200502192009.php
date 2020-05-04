<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200502192009 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE normeinstrument ADD norme_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE normeinstrument ADD CONSTRAINT FK_3034FA566F0D55C9 FOREIGN KEY (norme_id) REFERENCES norme (id)');
        $this->addSql('CREATE INDEX IDX_3034FA566F0D55C9 ON normeinstrument (norme_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE normeinstrument DROP FOREIGN KEY FK_3034FA566F0D55C9');
        $this->addSql('DROP INDEX IDX_3034FA566F0D55C9 ON normeinstrument');
        $this->addSql('ALTER TABLE normeinstrument DROP norme_id');
    }
}
