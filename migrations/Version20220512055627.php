<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512055627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE approval (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, article_id_id INT DEFAULT NULL, comment_id_id INT DEFAULT NULL, is_positive TINYINT(1) DEFAULT NULL, INDEX IDX_16E0952B9D86650F (user_id_id), INDEX IDX_16E0952B8F3EC46 (article_id_id), INDEX IDX_16E0952BD6DE06A6 (comment_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE approval ADD CONSTRAINT FK_16E0952B9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE approval ADD CONSTRAINT FK_16E0952B8F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE approval ADD CONSTRAINT FK_16E0952BD6DE06A6 FOREIGN KEY (comment_id_id) REFERENCES comment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE approval');
    }
}
