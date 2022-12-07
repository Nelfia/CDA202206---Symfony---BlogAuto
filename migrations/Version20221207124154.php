<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207124154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD auhtor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5221FC741 FOREIGN KEY (auhtor_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5221FC741 ON annonce (auhtor_id)');
        $this->addSql('ALTER TABLE user ADD author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F675F31B FOREIGN KEY (author_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F675F31B ON user (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5221FC741');
        $this->addSql('DROP INDEX IDX_F65593E5221FC741 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP auhtor_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F675F31B');
        $this->addSql('DROP INDEX IDX_8D93D649F675F31B ON user');
        $this->addSql('ALTER TABLE user DROP author_id');
    }
}
