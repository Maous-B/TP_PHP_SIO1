INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('SIO', 'Service Informatique aux Organisations', '2022/2024');
INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('NDRC', 'Négociation Digitalisation de la Relation Client', '2022/2024');
INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('CG', 'Comptabilité et Gestion', '2022/2024');

INSERT INTO candidat(NOM_CANDIDAT, PRENOM_CANDIDAT, fk_id_bts) VALUES('HARNAFI', 'Marwan', '1');
INSERT INTO candidat(NOM_CANDIDAT, PRENOM_CANDIDAT, fk_id_bts) VALUES('LEGAUD', 'Rayan', '1');
INSERT INTO candidat(NOM_CANDIDAT, PRENOM_CANDIDAT, fk_id_bts) VALUES('BOUANANE', 'Fethi', '2');
INSERT INTO candidat(NOM_CANDIDAT, PRENOM_CANDIDAT, fk_id_bts) VALUES('JOUARY', 'Antoine', '2');
INSERT INTO candidat(NOM_CANDIDAT, PRENOM_CANDIDAT, fk_id_bts) VALUES('ROBERT', 'Timothée', '2');

INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E6', 'Cybersécurité des organisations', 1);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E4', 'Développement', 1);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E5', 'Comptabilité', 3);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E3', 'Gestion', 3);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E7', 'Relation Client', 2);
