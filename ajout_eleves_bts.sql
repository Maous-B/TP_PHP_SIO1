INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('SIO', 'Service Informatique aux Organisations', '2022/2024');
INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('NDRC', 'Négociation Digitalisation de la Relation Client', '2022/2024');
INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('CG', 'Comptabilité et Gestion', '2022/2024');

INSERT INTO candidat(fk_id_bts, NUMERO_ELEVE, NOM_CANDIDAT, PRENOM_CANDIDAT) VALUES(1, 'ADQ1', 'HARNAFI', 'Marwan');
INSERT INTO candidat(fk_id_bts, NUMERO_ELEVE, NOM_CANDIDAT, PRENOM_CANDIDAT) VALUES(2, 'AKS2', 'ROBERT', 'Timothée');
INSERT INTO candidat(fk_id_bts, NUMERO_ELEVE, NOM_CANDIDAT, PRENOM_CANDIDAT) VALUES(2, 'BDF6', 'BEAUDOUX', 'Camille');
INSERT INTO candidat(fk_id_bts, NUMERO_ELEVE, NOM_CANDIDAT, PRENOM_CANDIDAT) VALUES(3, 'AZS66', 'DEBIEVE', 'Hugo');
INSERT INTO candidat(fk_id_bts, NUMERO_ELEVE, NOM_CANDIDAT, PRENOM_CANDIDAT) VALUES(2, 'ASW31', 'JOUARY', 'Antoine');
INSERT INTO candidat(fk_id_bts, NUMERO_ELEVE, NOM_CANDIDAT, PRENOM_CANDIDAT) VALUES(1, 'AGH13', 'BOUANANE', 'Fethi');

INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E6', 'Cybersécurité des organisations', 1);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E4', 'Développement', 1);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E5', 'Comptabilité', 3);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E3', 'Gestion', 3);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E7', 'Relation Client', 2);
