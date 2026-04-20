-- 30 Questions de Soutenance - Projet
-- Hotelo
-- Section 1 : Requêtes SQL (Pratique)  
-- 1. Comment afficher toutes les chambres triées par prix croissant ?
-- 2. Comment lister les clients dont l'email contient 'mailinator.com' ?
-- 3. Quelle est la requête pour compter le nombre total de chambres dans l'hôtel ?
-- 4. Comment afficher les réservations faites entre le 01/04/2026 et le 30/04/2026 ?
-- 5. Comment calculer le montant moyen des paiements effectués ?
-- 6. Trouver tous les utilisateurs qui n'ont jamais été bannis.
-- 7. Lister les chambres de type 'Suite' qui sont actuellement 'Disponible'.
-- 8. Afficher le nom du client et le numéro de chambre pour chaque réservation
-- 'confirmee'.
-- 9. Quelle est la réservation ayant la plus longue durée en jours ?
-- 10. Afficher les clients qui ont renseigné leur date de naissance.
-- 11. Compter le nombre de réservations par client (Nom et Nombre).
-- 12. Lister les factures dont le montant total est supérieur à 500€.
-- 13. Afficher les 5 derniers utilisateurs inscrits.
-- 14. Quelle chambre a été réservée le plus de fois ?
-- 15. Afficher tous les paiements rattachés au client avec l'ID n°9.
-- Section 2 : Conception de la Base de Données
-- 16. Pourquoi avoir choisi le type bigint UNSIGNED pour vos IDs ?
-- 17. À quoi sert la table migrations générée par Laravel ?
-- 18. Comment sécurisez-vous les mots de passe des utilisateurs ?
-- 19. Quelle est la différence technique entre CHAR et VARCHAR ?
-- 20. Pourquoi avoir séparé factures et paiements ?
-- 21. Quel est l'intérêt d'utiliser des timestamps ?
-- 22. À quoi sert la colonne remember_token ?
-- 23. Pourquoi utiliser DECIMAL pour les prix ?
-- 24. Quel est le rôle d'une clé étrangère ?
-- 25. Comment gérez-vous l'unicité des numéros de chambre ?
-- Section 3 : Logique Métier & Sécurité
-- 26. Comment vérifiez-vous si une chambre est libre avant réservation ?
-- 27. Que se passe-t-il si un utilisateur supprime son compte ?
-- 28. Comment empêchez-vous un client de modifier les réservations d'un autre ?
-- 29. Quelle est la procédure pour transformer une chambre Simple en Suite ?
-- 30. Comment gérez-vous les erreurs SQL pour l'utilisateur final 














////////////////////////////////////////////////////

-- Voici une liste de 20 questions ciblées exclusivement sur les jointures SQL (2, 3 et 4 tables) et la logique relationnelle pour ton projet Hotelo. Ces questions sont conçues pour tester ta capacité à naviguer entre les tables users, chambres, reservations, factures et paiements.

-- Jointures à 2 Tables (Niveau Facile)
-- Comment afficher le nom de chaque client à côté de la date de sa réservation ?

-- Quelle requête permet de lister les numéros de chambres et le montant total de la facture associée pour chaque séjour ?

-- Comment récupérer la liste des clients (nom et email) ayant un paiement au statut "Échoué" ?

-- Comment afficher tous les types de chambres (type) avec le montant total des paiements encaissés pour chacune ?

-- Comment lister les réservations (ID et statut) avec le nom du client qui a effectué la réservation ?

-- Jointures à 3 Tables (Niveau Intermédiaire)
-- Comment afficher le nom du client, le numéro de sa chambre et la date de début de son séjour (check_in) ? 

-- Quelle requête permet de voir le nom du client, le type de chambre réservé et le prix total de la réservation ?

-- Comment lister les factures (ID et total) avec le nom du client et le numéro de la chambre correspondante ?

-- Comment afficher les détails des paiements (montant, date) avec le nom du client et le statut de sa réservation ?

-- Comment trouver tous les clients qui ont séjourné dans une "Suite" ? (Nécessite users, reservations, chambres).

-- Jointures à 4 Tables (Niveau Avancé / Soutenance)
-- Le rapport complet : Comment afficher en une ligne le Nom du Client, le Numéro de Chambre, le Montant de la Facture et le Statut du Paiement ?

-- Comment lister les paiements "Payé" en affichant la date du paiement, le nom du client, le numéro de chambre et la catégorie de la chambre ?

-- Comment identifier les clients qui occupent actuellement une chambre (Statut chambre = 'Occupee') en affichant leur nom, le numéro de chambre, la date de fin de séjour et le montant déjà payé ?

-- Comment calculer le revenu total généré par chaque réceptionniste (si les réservations étaient liées à un employé) ? Note : Dans ton schéma, on peut lister les réservations confirmées avec les détails financiers.

-- Comment afficher l'historique financier d'un client : Nom, Numéro de chambre, Prix de base de la chambre, Total de la facture et Statut du paiement ?

-- Questions de Logique et Analyse (Questions "Pièges")
-- Pourquoi utiliser un LEFT JOIN plutôt qu'un INNER JOIN si on veut lister tous les clients, même ceux qui n'ont pas encore de réservation ?

-- Si une réservation est supprimée, que se passe-t-il pour les lignes correspondantes dans les tables factures et paiements ? Comment le prouvez-vous avec vos contraintes de clés étrangères ?

-- Comment gérez-vous le cas où un client a plusieurs lignes de paiement pour une seule facture ? Comment faire la somme de ces paiements dans une jointure ?

-- Quelle est la différence de performance entre faire une jointure sur 4 tables et faire 4 requêtes séparées en PHP ?

-- Dans ta requête à 3 jointures, si une chambre n'a pas encore de facture générée, apparaîtra-t-elle dans les résultats si tu utilises INNER JOIN ?