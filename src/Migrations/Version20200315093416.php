<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200315093416 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('CREATE TABLE color (
                            id INT AUTO_INCREMENT NOT NULL, 
                            hex VARCHAR(8) NOT NULL, 
                            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
                            ');
        $this->addSql('ALTER TABLE car ADD 
                            color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD 
                            CONSTRAINT FK_773DE69D7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('CREATE INDEX IDX_773DE69D7ADA1FB5 ON car (color_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7ADA1FB5');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP INDEX IDX_773DE69D7ADA1FB5 ON car');
        $this->addSql('ALTER TABLE car DROP color_id');
    }
}
