<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210826080849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE action_actionid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE article_articleid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE budgetisation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE catservice_catid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE champcompetence_competenceid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE classe_classeid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE commune_communeid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE departement_depid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE division_divisionid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE groupe_groupeid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE misbudget_misbudgetid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE misetat_misetatid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE paragraphe_paragrapheid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE piece_justificative_id_piece_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE programme_programmeid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE region_regionid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rubrique_rubriqueid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE typebudget_typebudgetid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE typepgram_typepgramid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE typeservice_serviceid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE typeunite_typeid_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE uniteadmin_uniteid_seq INCREMENT BY 1 MINVALUE 1 START 1');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE action_actionid_seq CASCADE');
        $this->addSql('DROP SEQUENCE article_articleid_seq CASCADE');
        $this->addSql('DROP SEQUENCE budgetisation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE catservice_catid_seq CASCADE');
        $this->addSql('DROP SEQUENCE champcompetence_competenceid_seq CASCADE');
        $this->addSql('DROP SEQUENCE classe_classeid_seq CASCADE');
        $this->addSql('DROP SEQUENCE commune_communeid_seq CASCADE');
        $this->addSql('DROP SEQUENCE departement_depid_seq CASCADE');
        $this->addSql('DROP SEQUENCE division_divisionid_seq CASCADE');
        $this->addSql('DROP SEQUENCE groupe_groupeid_seq CASCADE');
        $this->addSql('DROP SEQUENCE misbudget_misbudgetid_seq CASCADE');
        $this->addSql('DROP SEQUENCE misetat_misetatid_seq CASCADE');
        $this->addSql('DROP SEQUENCE paragraphe_paragrapheid_seq CASCADE');
        $this->addSql('DROP SEQUENCE piece_justificative_id_piece_seq CASCADE');
        $this->addSql('DROP SEQUENCE programme_programmeid_seq CASCADE');
        $this->addSql('DROP SEQUENCE region_regionid_seq CASCADE');
        $this->addSql('DROP SEQUENCE rubrique_rubriqueid_seq CASCADE');
        $this->addSql('DROP SEQUENCE typebudget_typebudgetid_seq CASCADE');
        $this->addSql('DROP SEQUENCE typepgram_typepgramid_seq CASCADE');
        $this->addSql('DROP SEQUENCE typeservice_serviceid_seq CASCADE');
        $this->addSql('DROP SEQUENCE typeunite_typeid_seq CASCADE');
        $this->addSql('DROP SEQUENCE uniteadmin_uniteid_seq CASCADE');
    }
}
