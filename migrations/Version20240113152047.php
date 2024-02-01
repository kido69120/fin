<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240113152047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice ADD muscle_id INT DEFAULT NULL, ADD intensity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D354FDBB4 FOREIGN KEY (muscle_id) REFERENCES muscle (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D91A55F57 FOREIGN KEY (intensity_id) REFERENCES intensity (id)');
        $this->addSql('CREATE INDEX IDX_E418C74D354FDBB4 ON exercice (muscle_id)');
        $this->addSql('CREATE INDEX IDX_E418C74D91A55F57 ON exercice (intensity_id)');
        $this->addSql('ALTER TABLE muscle ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE muscle ADD CONSTRAINT FK_F31119EF12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_F31119EF12469DE2 ON muscle (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D354FDBB4');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D91A55F57');
        $this->addSql('DROP INDEX IDX_E418C74D354FDBB4 ON exercice');
        $this->addSql('DROP INDEX IDX_E418C74D91A55F57 ON exercice');
        $this->addSql('ALTER TABLE exercice DROP muscle_id, DROP intensity_id');
        $this->addSql('ALTER TABLE muscle DROP FOREIGN KEY FK_F31119EF12469DE2');
        $this->addSql('DROP INDEX IDX_F31119EF12469DE2 ON muscle');
        $this->addSql('ALTER TABLE muscle DROP category_id');
    }
}
