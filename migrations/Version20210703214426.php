<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703214426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles_option_article (articles_option_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_956FDCB75A0770E3 (articles_option_id), INDEX IDX_956FDCB77294869C (article_id), PRIMARY KEY(articles_option_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_option_article ADD CONSTRAINT FK_956FDCB75A0770E3 FOREIGN KEY (articles_option_id) REFERENCES articles_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_option_article ADD CONSTRAINT FK_956FDCB77294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE articles_option_article');
    }
}
