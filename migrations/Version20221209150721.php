<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221209150721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, annonce_fav_id INT DEFAULT NULL, users_fav_id INT DEFAULT NULL, INDEX IDX_8933C4327CCEF365 (annonce_fav_id), INDEX IDX_8933C432138E7EEB (users_fav_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C4327CCEF365 FOREIGN KEY (annonce_fav_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432138E7EEB FOREIGN KEY (users_fav_id) REFERENCES annonce (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C4327CCEF365');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432138E7EEB');
        $this->addSql('DROP TABLE favoris');
    }
}
