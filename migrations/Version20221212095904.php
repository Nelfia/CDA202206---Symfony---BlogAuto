<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212095904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_list_by_user (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, annonces_id INT DEFAULT NULL, INDEX IDX_81A4A15E67B3B43D (users_id), INDEX IDX_81A4A15E4C2885D7 (annonces_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce_list_by_user ADD CONSTRAINT FK_81A4A15E67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce_list_by_user ADD CONSTRAINT FK_81A4A15E4C2885D7 FOREIGN KEY (annonces_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432138E7EEB');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C4327CCEF365');
        $this->addSql('DROP TABLE favoris');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favoris (id INT AUTO_INCREMENT NOT NULL, annonce_fav_id INT DEFAULT NULL, users_fav_id INT DEFAULT NULL, INDEX IDX_8933C4327CCEF365 (annonce_fav_id), INDEX IDX_8933C432138E7EEB (users_fav_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432138E7EEB FOREIGN KEY (users_fav_id) REFERENCES annonce (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C4327CCEF365 FOREIGN KEY (annonce_fav_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE annonce_list_by_user DROP FOREIGN KEY FK_81A4A15E67B3B43D');
        $this->addSql('ALTER TABLE annonce_list_by_user DROP FOREIGN KEY FK_81A4A15E4C2885D7');
        $this->addSql('DROP TABLE annonce_list_by_user');
    }
}
