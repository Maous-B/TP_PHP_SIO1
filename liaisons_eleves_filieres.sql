SELECT c.NOM_CANDIDAT, c.PRENOM_CANDIDAT, f.LIBELLE_BTS
FROM candidat c
INNER JOIN filiere_bts f
ON c.fk_id_bts = f.id_bts
WHERE f.code_bts= 'SIO'
