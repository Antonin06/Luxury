<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200710132619 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job_offer ADD type_job_id INT DEFAULT NULL, ADD job_offer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E28372591 FOREIGN KEY (type_job_id) REFERENCES job_type (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E3481D195 FOREIGN KEY (job_offer_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E28372591 ON job_offer (type_job_id)');
        $this->addSql('CREATE INDEX IDX_288A3A4E3481D195 ON job_offer (job_offer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E28372591');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E3481D195');
        $this->addSql('DROP INDEX IDX_288A3A4E28372591 ON job_offer');
        $this->addSql('DROP INDEX IDX_288A3A4E3481D195 ON job_offer');
        $this->addSql('ALTER TABLE job_offer DROP type_job_id, DROP job_offer_id');
    }
}
