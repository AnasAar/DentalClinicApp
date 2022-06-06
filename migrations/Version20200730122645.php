<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200730122645 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, date_cons DATETIME NOT NULL, type_cons VARCHAR(100) NOT NULL, INDEX IDX_964685A66B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier_medical (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, cnss VARCHAR(200) NOT NULL, cnops VARCHAR(200) NOT NULL, obsservation LONGTEXT NOT NULL, INDEX IDX_3581EE626B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, paiment_id INT NOT NULL, fiche_id INT NOT NULL, tarif DOUBLE PRECISION NOT NULL, date_facture DATE NOT NULL, INDEX IDX_FE86641078789290 (paiment_id), INDEX IDX_FE866410DF522508 (fiche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_traitement (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, nbr_fiche INT NOT NULL, INDEX IDX_846369D06B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lignetraitement (id INT AUTO_INCREMENT NOT NULL, fiche_id INT NOT NULL, nom_dent VARCHAR(100) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, type_traitement VARCHAR(100) NOT NULL, INDEX IDX_A84CC3B2DF522508 (fiche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medcin (id INT AUTO_INCREMENT NOT NULL, specialite_id INT NOT NULL, nom_medcin VARCHAR(100) NOT NULL, prenom_medcin VARCHAR(100) NOT NULL, tel_medcin INT NOT NULL, email_medcin VARCHAR(200) NOT NULL, cin_medcin VARCHAR(100) NOT NULL, prix_visite DOUBLE PRECISION NOT NULL, active VARCHAR(100) NOT NULL, INDEX IDX_B49ACC862195E0F0 (specialite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament (id INT AUTO_INCREMENT NOT NULL, nom_medi VARCHAR(200) NOT NULL, dose_medi VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordonance (id INT AUTO_INCREMENT NOT NULL, prescription_id INT NOT NULL, consultation_id INT NOT NULL, date_ord DATE NOT NULL, INDEX IDX_99240B9C93DB413D (prescription_id), INDEX IDX_99240B9C62FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, mode_paiment VARCHAR(100) NOT NULL, montant_paye DOUBLE PRECISION NOT NULL, montantnon_paye DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom_pat VARCHAR(50) NOT NULL, prenom_pat VARCHAR(50) NOT NULL, email_pat VARCHAR(200) DEFAULT NULL, sexe_pat VARCHAR(50) NOT NULL, adresse_pat VARCHAR(200) NOT NULL, cin_pat VARCHAR(100) NOT NULL, tel_pat INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, medcicament_id INT NOT NULL, nbr_fois INT NOT NULL, quand_medi VARCHAR(100) NOT NULL, forme_medi VARCHAR(100) NOT NULL, INDEX IDX_1FBFB8D9A6782B41 (medcicament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, medcin_id INT NOT NULL, patient_id INT NOT NULL, date_rdv DATETIME NOT NULL, INDEX IDX_10C31F86F46C40AE (medcin_id), INDEX IDX_10C31F866B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, nom_specialite VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE dossier_medical ADD CONSTRAINT FK_3581EE626B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641078789290 FOREIGN KEY (paiment_id) REFERENCES paiement (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410DF522508 FOREIGN KEY (fiche_id) REFERENCES fiche_traitement (id)');
        $this->addSql('ALTER TABLE fiche_traitement ADD CONSTRAINT FK_846369D06B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE lignetraitement ADD CONSTRAINT FK_A84CC3B2DF522508 FOREIGN KEY (fiche_id) REFERENCES fiche_traitement (id)');
        $this->addSql('ALTER TABLE medcin ADD CONSTRAINT FK_B49ACC862195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE ordonance ADD CONSTRAINT FK_99240B9C93DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id)');
        $this->addSql('ALTER TABLE ordonance ADD CONSTRAINT FK_99240B9C62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9A6782B41 FOREIGN KEY (medcicament_id) REFERENCES medicament (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86F46C40AE FOREIGN KEY (medcin_id) REFERENCES medcin (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F866B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ordonance DROP FOREIGN KEY FK_99240B9C62FF6CDF');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410DF522508');
        $this->addSql('ALTER TABLE lignetraitement DROP FOREIGN KEY FK_A84CC3B2DF522508');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86F46C40AE');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9A6782B41');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641078789290');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A66B899279');
        $this->addSql('ALTER TABLE dossier_medical DROP FOREIGN KEY FK_3581EE626B899279');
        $this->addSql('ALTER TABLE fiche_traitement DROP FOREIGN KEY FK_846369D06B899279');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F866B899279');
        $this->addSql('ALTER TABLE ordonance DROP FOREIGN KEY FK_99240B9C93DB413D');
        $this->addSql('ALTER TABLE medcin DROP FOREIGN KEY FK_B49ACC862195E0F0');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE dossier_medical');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE fiche_traitement');
        $this->addSql('DROP TABLE lignetraitement');
        $this->addSql('DROP TABLE medcin');
        $this->addSql('DROP TABLE medicament');
        $this->addSql('DROP TABLE ordonance');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE specialite');
    }
}
