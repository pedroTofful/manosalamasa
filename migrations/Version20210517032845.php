<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517032845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingrediente (id INT AUTO_INCREMENT NOT NULL, ingrediente_dsc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE perfil (id INT AUTO_INCREMENT NOT NULL, perfil_nom_ape VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receta (id INT AUTO_INCREMENT NOT NULL, receta_nombre VARCHAR(255) NOT NULL, receta_img LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receta_ingrediente (id INT AUTO_INCREMENT NOT NULL, receta_id INT DEFAULT NULL, ingrediente_id INT DEFAULT NULL, receta_ingrediente_cant INT NOT NULL, receta_ingrediente_unm VARCHAR(255) NOT NULL, INDEX IDX_F7A6A61354F853F8 (receta_id), INDEX IDX_F7A6A613769E458D (ingrediente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restriccion (id INT AUTO_INCREMENT NOT NULL, restriccion_dsc VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restriccion_perfil (restriccion_id INT NOT NULL, perfil_id INT NOT NULL, INDEX IDX_DB8C4743446FA471 (restriccion_id), INDEX IDX_DB8C474357291544 (perfil_id), PRIMARY KEY(restriccion_id, perfil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restriccion_receta (restriccion_id INT NOT NULL, receta_id INT NOT NULL, INDEX IDX_FD7A784A446FA471 (restriccion_id), INDEX IDX_FD7A784A54F853F8 (receta_id), PRIMARY KEY(restriccion_id, receta_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restriccion_ingrediente (restriccion_id INT NOT NULL, ingrediente_id INT NOT NULL, INDEX IDX_E147477D446FA471 (restriccion_id), INDEX IDX_E147477D769E458D (ingrediente_id), PRIMARY KEY(restriccion_id, ingrediente_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, perfil_id INT DEFAULT NULL, usuario_mail VARCHAR(255) NOT NULL, usuario_pass VARCHAR(255) NOT NULL, usuario_admin TINYINT(1) NOT NULL, usuario_activo TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_2265B05D57291544 (perfil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE receta_ingrediente ADD CONSTRAINT FK_F7A6A61354F853F8 FOREIGN KEY (receta_id) REFERENCES receta (id)');
        $this->addSql('ALTER TABLE receta_ingrediente ADD CONSTRAINT FK_F7A6A613769E458D FOREIGN KEY (ingrediente_id) REFERENCES ingrediente (id)');
        $this->addSql('ALTER TABLE restriccion_perfil ADD CONSTRAINT FK_DB8C4743446FA471 FOREIGN KEY (restriccion_id) REFERENCES restriccion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restriccion_perfil ADD CONSTRAINT FK_DB8C474357291544 FOREIGN KEY (perfil_id) REFERENCES perfil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restriccion_receta ADD CONSTRAINT FK_FD7A784A446FA471 FOREIGN KEY (restriccion_id) REFERENCES restriccion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restriccion_receta ADD CONSTRAINT FK_FD7A784A54F853F8 FOREIGN KEY (receta_id) REFERENCES receta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restriccion_ingrediente ADD CONSTRAINT FK_E147477D446FA471 FOREIGN KEY (restriccion_id) REFERENCES restriccion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE restriccion_ingrediente ADD CONSTRAINT FK_E147477D769E458D FOREIGN KEY (ingrediente_id) REFERENCES ingrediente (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D57291544 FOREIGN KEY (perfil_id) REFERENCES perfil (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receta_ingrediente DROP FOREIGN KEY FK_F7A6A613769E458D');
        $this->addSql('ALTER TABLE restriccion_ingrediente DROP FOREIGN KEY FK_E147477D769E458D');
        $this->addSql('ALTER TABLE restriccion_perfil DROP FOREIGN KEY FK_DB8C474357291544');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D57291544');
        $this->addSql('ALTER TABLE receta_ingrediente DROP FOREIGN KEY FK_F7A6A61354F853F8');
        $this->addSql('ALTER TABLE restriccion_receta DROP FOREIGN KEY FK_FD7A784A54F853F8');
        $this->addSql('ALTER TABLE restriccion_perfil DROP FOREIGN KEY FK_DB8C4743446FA471');
        $this->addSql('ALTER TABLE restriccion_receta DROP FOREIGN KEY FK_FD7A784A446FA471');
        $this->addSql('ALTER TABLE restriccion_ingrediente DROP FOREIGN KEY FK_E147477D446FA471');
        $this->addSql('DROP TABLE ingrediente');
        $this->addSql('DROP TABLE perfil');
        $this->addSql('DROP TABLE receta');
        $this->addSql('DROP TABLE receta_ingrediente');
        $this->addSql('DROP TABLE restriccion');
        $this->addSql('DROP TABLE restriccion_perfil');
        $this->addSql('DROP TABLE restriccion_receta');
        $this->addSql('DROP TABLE restriccion_ingrediente');
        $this->addSql('DROP TABLE usuario');
    }
}
