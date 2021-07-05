<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703212729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article_articles_option');
        $this->addSql('ALTER TABLE articles_option DROP is_active');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_articles_option (article_id INT NOT NULL, articles_option_id INT NOT NULL, INDEX IDX_37BE4035A0770E3 (articles_option_id), INDEX IDX_37BE4037294869C (article_id), PRIMARY KEY(article_id, articles_option_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article_articles_option ADD CONSTRAINT FK_37BE4035A0770E3 FOREIGN KEY (articles_option_id) REFERENCES articles_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_articles_option ADD CONSTRAINT FK_37BE4037294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_option ADD is_active TINYINT(1) NOT NULL');
    }
}
