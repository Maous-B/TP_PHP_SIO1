INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('SIO', 'Service Informatique aux Organisations', '2022/2024');
INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('NDRC', 'Négociation Digitalisation de la Relation Client', '2022/2024');
INSERT INTO filiere_bts(CODE_BTS, LIBELLE_BTS, ANNEE_CONCERNEE) VALUES('CG', 'Comptabilité et Gestion', '2022/2024');

INSERT INTO `candidat` (`CLEF_ELEVE`, `NUMERO_ELEVE`, `NOM_CANDIDAT`, `PRENOM_CANDIDAT`, `fk_id_bts`) VALUES
	(1, 'ADQ1', 'HARNAFI', 'Marwan', 1),
	(2, 'AKS2', 'ROBERT', 'Timothée', 2),
	(3, 'BDF6', 'BEAUDOUX', 'Camille', 2),
	(4, 'AZS66', 'DEBIEVE', 'Hugo', 3),
	(5, 'ASW31', 'JOUARY', 'Antoine', 2),
	(6, 'AGH13', 'BOUANANE', 'Fethi', 1);

INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E6', 'Cybersécurité des organisations', 1);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E4', 'Développement', 1);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E5', 'Comptabilité', 3);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E3', 'Gestion', 3);
INSERT INTO ccf(CODE_CCF, LIBELLE_CCF, fk_id_bts) VALUES('E7', 'Relation Client', 2);
