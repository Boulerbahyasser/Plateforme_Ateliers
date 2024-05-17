-- Insert into users table
INSERT INTO users (name, email, password, role, created_at, updated_at)
VALUES
    ('Smith John', 'john.smith01@example.com', 'hashed_password1', 'administrateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Doe Jane', 'jane.doe01@example.com', 'hashed_password2', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Roe Richard', 'richard.roe01@example.com', 'hashed_password3', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Dane Diana', 'diana.dane01@example.com', 'hashed_password4', 'animateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Brown Charlie', 'charlie.brown01@example.com', 'hashed_password5', 'administrateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Wilson Will', 'will.wilson01@example.com', 'hashed_password6', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Taylor Thomas', 'thomas.taylor01@example.com', 'hashed_password7', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Davis Danny', 'danny.davis01@example.com', 'hashed_password8', 'animateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('White Walter', 'walter.white01@example.com', 'hashed_password9', 'administrateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Green Grace', 'grace.green01@example.com', 'hashed_password10', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Black Blake', 'blake.black01@example.com', 'hashed_password11', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('King Karen', 'karen.king01@example.com', 'hashed_password12', 'animateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Lee Lucas', 'lucas.lee01@example.com', 'hashed_password13', 'administrateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Young Yara', 'yara.young01@example.com', 'hashed_password14', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Allen Amy', 'amy.allen01@example.com', 'hashed_password15', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Wright Wendy', 'wendy.wright01@example.com', 'hashed_password16', 'animateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Walker Warren', 'warren.walker01@example.com', 'hashed_password17', 'administrateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Scott Sara', 'sara.scott01@example.com', 'hashed_password18', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Adams Andrew', 'andrew.adams01@example.com', 'hashed_password19', 'utilisateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Baker Betty', 'betty.baker01@example.com', 'hashed_password20', 'animateur', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Insert into factures table
INSERT INTO factures (date, total_ht, total_ttc, created_at, updated_at) VALUES
                                 ('2024-05-01', 100.00, 120.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-02', 200.00, 240.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-03', 150.00, 180.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-04', 300.00, 360.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-05', 250.00, 300.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-06', 350.00, 420.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-07', 400.00, 480.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-08', 450.00, 540.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-09', 500.00, 600.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-10', 550.00, 660.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-11', 600.00, 720.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-12', 650.00, 780.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-13', 700.00, 840.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-14', 750.00, 900.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-15', 800.00, 960.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-16', 850.00, 1020.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-17', 900.00, 1080.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-18', 950.00, 1140.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-19', 1000.00, 1200.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
                                 ('2024-05-20', 1050.00, 1260.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


-- Insert into activites table
INSERT INTO activites (titre, IMAGE_PUB, description, lien_youtube, objectifs, domaine, created_at, updated_at)
VALUES
    ('Activity 1', NULL, 'Description for activity 1', 'youtube_link_1', 'Objectives for activity 1', 'Domain 1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 2', NULL, 'Description for activity 2', 'youtube_link_2', 'Objectives for activity 2', 'Domain 2', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 3', NULL, 'Description for activity 3', 'youtube_link_3', 'Objectives for activity 3', 'Domain 3', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 4', NULL, 'Description for activity 4', 'youtube_link_4', 'Objectives for activity 4', 'Domain 4', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 5', NULL, 'Description for activity 5', 'youtube_link_5', 'Objectives for activity 5', 'Domain 5', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 6', NULL, 'Description for activity 6', 'youtube_link_6', 'Objectives for activity 6', 'Domain 6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 7', NULL, 'Description for activity 7', 'youtube_link_7', 'Objectives for activity 7', 'Domain 7', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 8', NULL, 'Description for activity 8', 'youtube_link_8', 'Objectives for activity 8', 'Domain 8', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 9', NULL, 'Description for activity 9', 'youtube_link_9', 'Objectives for activity 9', 'Domain 9', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 10', NULL, 'Description for activity 10', 'youtube_link_10', 'Objectives for activity 10', 'Domain 10', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 11', NULL, 'Description for activity 11', 'youtube_link_11', 'Objectives for activity 11', 'Domain 11', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 12', NULL, 'Description for activity 12', 'youtube_link_12', 'Objectives for activity 12', 'Domain 12', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 13', NULL, 'Description for activity 13', 'youtube_link_13', 'Objectives for activity 13', 'Domain 13', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 14', NULL, 'Description for activity 14', 'youtube_link_14', 'Objectives for activity 14', 'Domain 14', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 15', NULL, 'Description for activity 15', 'youtube_link_15', 'Objectives for activity 15', 'Domain 15', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 16', NULL, 'Description for activity 16', 'youtube_link_16', 'Objectives for activity 16', 'Domain 16', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 17', NULL, 'Description for activity 17', 'youtube_link_17', 'Objectives for activity 17', 'Domain 17', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 18', NULL, 'Description for activity 18', 'youtube_link_18', 'Objectives for activity 18', 'Domain 18', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 19', NULL, 'Description for activity 19', 'youtube_link_19', 'Objectives for activity 19', 'Domain 19', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Activity 20', NULL, 'Description for activity 20', 'youtube_link_20', 'Objectives for activity 20', 'Domain 20', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Insert into horaires table
INSERT INTO horaires (jour, heure_debut, heure_fin, created_at, updated_at)
VALUES
    ('Monday', '08:00:00', '17:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Tuesday', '09:00:00', '18:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Wednesday', '07:30:00', '16:30:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Thursday', '08:30:00', '17:30:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Friday', '08:00:00', '16:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Saturday', '10:00:00', '14:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Sunday', '10:00:00', '14:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Monday', '08:30:00', '17:30:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Tuesday', '09:30:00', '18:30:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Wednesday', '07:00:00', '16:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Thursday', '08:00:00', '17:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Friday', '08:30:00', '16:30:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Saturday', '09:00:00', '15:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Sunday', '09:00:00', '15:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Monday', '08:00:00', '17:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Tuesday', '09:00:00', '18:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Wednesday', '07:30:00', '16:30:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Thursday', '08:30:00', '17:30:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Friday', '08:00:00', '16:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Saturday', '10:00:00', '14:00:00', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Insert into animateurs table
INSERT INTO animateurs (domaine, user_id, created_at, updated_at)
VALUES
    ('Domaine 1', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 2', 8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 3', 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 4', 16, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 5', 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 6', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 7', 8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 8', 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 9', 16, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 10', 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 11', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 12', 8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 13', 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 14', 16, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 15', 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 16', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 17', 8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 18', 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 19', 16, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    ('Domaine 20', 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Insert into administrateurs table
INSERT INTO administrateurs (user_id, created_at, updated_at)
VALUES
    (1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- Insert into notifications table
INSERT INTO notifications (user_id, date, contenu, type, created_at, updated_at)
VALUES
    (1, '2024-05-08', 'Notification content for user 1', 'Type A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, '2024-05-08', 'Notification content for user 2', 'Type B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, '2024-05-08', 'Notification content for user 3', 'Type C', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, '2024-05-08', 'Notification content for user 4', 'Type A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, '2024-05-08', 'Notification content for user 5', 'Type B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, '2024-05-08', 'Notification content for user 6', 'Type C', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, '2024-05-08', 'Notification content for user 7', 'Type A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, '2024-05-08', 'Notification content for user 8', 'Type B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, '2024-05-08', 'Notification content for user 9', 'Type C', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, '2024-05-08', 'Notification content for user 10', 'Type A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, '2024-05-08', 'Notification content for user 11', 'Type B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, '2024-05-08', 'Notification content for user 12', 'Type C', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, '2024-05-08', 'Notification content for user 13', 'Type A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, '2024-05-08', 'Notification content for user 14', 'Type B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, '2024-05-08', 'Notification content for user 15', 'Type C', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, '2024-05-08', 'Notification content for user 16', 'Type A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, '2024-05-08', 'Notification content for user 17', 'Type B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, '2024-05-08', 'Notification content for user 18', 'Type C', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, '2024-05-08', 'Notification content for user 19', 'Type A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, '2024-05-08', 'Notification content for user 20', 'Type B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


-- Insert into fathers table
INSERT INTO fathers (user_id, fonction, created_at, updated_at)
VALUES
    (1, 'Fonction for user 1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 'Fonction for user 2', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 'Fonction for user 3', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 'Fonction for user 4', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 'Fonction for user 5', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 'Fonction for user 6', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 'Fonction for user 7', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 'Fonction for user 8', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 'Fonction for user 9', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 'Fonction for user 10', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 'Fonction for user 11', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 'Fonction for user 12', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 'Fonction for user 13', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 'Fonction for user 14', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 'Fonction for user 15', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 'Fonction for user 16', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 'Fonction for user 17', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 'Fonction for user 18', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 'Fonction for user 19', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 'Fonction for user 20', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO enfants (father_id, nom, prenom, date_naissance, niveau, photo, created_at, updated_at)
VALUES
    (1, 'Nom for parent 1', 'Prenom for parent 1', '2000-01-01', 'Niveau for parent 1', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 'Nom for parent 2', 'Prenom for parent 2', '2000-01-02', 'Niveau for parent 2', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 'Nom for parent 3', 'Prenom for parent 3', '2000-01-03', 'Niveau for parent 3', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 'Nom for parent 4', 'Prenom for parent 4', '2000-01-04', 'Niveau for parent 4', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 'Nom for parent 5', 'Prenom for parent 5', '2000-01-05', 'Niveau for parent 5', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 'Nom for parent 6', 'Prenom for parent 6', '2000-01-06', 'Niveau for parent 6', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 'Nom for parent 7', 'Prenom for parent 7', '2000-01-07', 'Niveau for parent 7', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 'Nom for parent 8', 'Prenom for parent 8', '2000-01-08', 'Niveau for parent 8', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 'Nom for parent 9', 'Prenom for parent 9', '2000-01-09', 'Niveau for parent 9', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 'Nom for parent 10', 'Prenom for parent 10', '2000-01-10', 'Niveau for parent 10', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 'Nom for parent 11', 'Prenom for parent 11', '2000-01-11', 'Niveau for parent 11', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 'Nom for parent 12', 'Prenom for parent 12', '2000-01-12', 'Niveau for parent 12', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 'Nom for parent 13', 'Prenom for parent 13', '2000-01-13', 'Niveau for parent 13', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 'Nom for parent 14', 'Prenom for parent 14', '2000-01-14', 'Niveau for parent 14', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 'Nom for parent 15', 'Prenom for parent 15', '2000-01-15', 'Niveau for parent 15', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 'Nom for parent 16', 'Prenom for parent 16', '2000-01-16', 'Niveau for parent 16', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 'Nom for parent 17', 'Prenom for parent 17', '2000-01-17', 'Niveau for parent 17', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 'Nom for parent 18', 'Prenom for parent 18', '2000-01-18', 'Niveau for parent 18', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 'Nom for parent 19', 'Prenom for parent 19', '2000-01-19', 'Niveau for parent 19', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 'Nom for parent 20', 'Prenom for parent 20', '2000-01-20', 'Niveau for parent 20', NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO demandes (admin_id, date, statut, created_at, updated_at)
VALUES
    (1, '2024-05-08 08:00:00', 'brouillon', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (1, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (1, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (1, '2024-05-08 08:00:00', 'brouillon', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, '2024-05-08 08:00:00', 'brouillon', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, '2024-05-08 08:00:00', 'brouillon', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, '2024-05-08 08:00:00', 'valide', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);



INSERT INTO offres (admin_id, titre, date_debut, date_fin, description, remise, created_at, updated_at)
VALUES
    (1, 'Titre 1', '2024-05-09', '2024-05-15', 'Description for offre 1', 10.50, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 'Titre 2', '2024-05-10', '2024-05-16', 'Description for offre 2', 20.75, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 'Titre 3', '2024-05-11', '2024-05-17', 'Description for offre 3', 15.25, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 'Titre 4', '2024-05-12', '2024-05-18', 'Description for offre 4', 30.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 'Titre 5', '2024-05-13', '2024-05-19', 'Description for offre 5', 25.75, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 'Titre 6', '2024-05-14', '2024-05-20', 'Description for offre 6', 12.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 'Titre 7', '2024-05-15', '2024-05-21', 'Description for offre 7', 18.50, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 'Titre 8', '2024-05-16', '2024-05-22', 'Description for offre 8', 22.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 'Titre 9', '2024-05-17', '2024-05-23', 'Description for offre 9', 17.75, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 'Titre 10', '2024-05-18', '2024-05-24', 'Description for offre 10', 28.25, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 'Titre 11', '2024-05-19', '2024-05-25', 'Description for offre 11', 14.75, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 'Titre 12', '2024-05-20', '2024-05-26', 'Description for offre 12', 35.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 'Titre 13', '2024-05-21', '2024-05-27', 'Description for offre 13', 21.50, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 'Titre 14', '2024-05-22', '2024-05-28', 'Description for offre 14', 16.25, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 'Titre 15', '2024-05-23', '2024-05-29', 'Description for offre 15', 32.75, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 'Titre 16', '2024-05-24', '2024-05-30', 'Description for offre 16', 19.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 'Titre 17', '2024-05-25', '2024-05-31', 'Description for offre 17', 24.50, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 'Titre 18', '2024-05-26', '2024-06-01', 'Description for offre 18', 29.75, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 'Titre 19', '2024-05-27', '2024-06-02', 'Description for offre 19', 13.25, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 'Titre 20', '2024-05-28', '2024-06-03', 'Description for offre 20', 26.50, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO activite_offres (offre_id, activite_id, tarif, tarif_remise, age_min, age_max, nbr_seance, volume_horaire, option_paiement, created_at, updated_at)
VALUES
    (1, 1, 50.00, 50.00, 5, 10, 8, 16, 'Option A', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 2, 60.00, 60.00, 6, 11, 7, 14, 'Option B', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 3, 70.00, 70.00, 7, 12, 6, 12, 'Option C', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 4, 80.00, 80.00, 8, 13, 5, 10, 'Option D', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 5, 90.00, 90.00, 9, 14, 4, 8, 'Option E', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 6, 100.00, 100.00, 10, 15, 3, 6, 'Option F', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 7, 110.00, 110.00, 11, 16, 2, 4, 'Option G', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 8, 120.00, 120.00, 12, 17, 1, 2, 'Option H', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 9, 130.00, 130.00, 13, 18, 8, 16, 'Option I', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 10, 140.00, 140.00, 14, 19, 7, 14, 'Option J', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 11, 150.00, 150.00, 15, 20, 6, 12, 'Option K', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 12, 160.00, 160.00, 16, 21, 5, 10, 'Option L', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 13, 170.00, 170.00, 17, 22, 4, 8, 'Option M', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 14, 180.00, 180.00, 18, 23, 3, 6, 'Option N', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 15, 190.00, 190.00, 19, 24, 2, 4, 'Option O', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 16, 200.00, 200.00, 20, 25, 1, 2, 'Option P', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 17, 210.00, 210.00, 21, 26, 8, 16, 'Option Q', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 18, 220.00, 220.00, 22, 27, 7, 14, 'Option R', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 19, 230.00, 230.00, 23, 28, 6, 12, 'Option S', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 20, 240.00, 240.00, 24, 29, 5, 10, 'Option T', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO packs (demande_id, nom, remise, created_at, updated_at)
VALUES
    (1, 'Pack 1', 10.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 'Pack 2', 15.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 'Pack 3', 20.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 'Pack 4', 25.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 'Pack 5', 30.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 'Pack 6', 35.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 'Pack 7', 40.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 'Pack 8', 45.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 'Pack 9', 50.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 'Pack 10', 55.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 'Pack 11', 60.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 'Pack 12', 65.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 'Pack 13', 70.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 'Pack 14', 75.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 'Pack 15', 80.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 'Pack 16', 85.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 'Pack 17', 90.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 'Pack 18', 95.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 'Pack 19', 100.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 'Pack 20', 105.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO devis (demande_id, facture_id, date, totale_ht, totale_ttc, statut, etat, motif, pdf, created_at, updated_at)
VALUES
    (1, 1, '2024-05-08 08:00:00', 100.00, 120.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis1.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 2, '2024-05-08 08:00:00', 150.00, 180.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis2.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 3, '2024-05-08 08:00:00', 200.00, 240.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis3.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 4, '2024-05-08 08:00:00', 250.00, 300.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis4.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 5, '2024-05-08 08:00:00', 300.00, 360.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis5.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 6, '2024-05-08 08:00:00', 350.00, 420.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis6.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 7, '2024-05-08 08:00:00', 400.00, 480.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis7.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 8, '2024-05-08 08:00:00', 450.00, 540.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis8.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 9, '2024-05-08 08:00:00', 500.00, 600.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis9.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 10, '2024-05-08 08:00:00', 550.00, 660.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis10.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 11, '2024-05-08 08:00:00', 600.00, 720.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis11.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 12, '2024-05-08 08:00:00', 650.00, 780.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis12.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 13, '2024-05-08 08:00:00', 700.00, 840.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis13.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 14, '2024-05-08 08:00:00', 750.00, 900.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis14.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 15, '2024-05-08 08:00:00', 800.00, 960.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis15.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 16, '2024-05-08 08:00:00', 850.00, 1020.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis16.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 17, '2024-05-08 08:00:00', 900.00, 1080.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis17.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 18, '2024-05-08 08:00:00', 950.00, 1140.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis18.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 19, '2024-05-08 08:00:00', 1000.00, 1200.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis19.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 20, '2024-05-08 08:00:00', 1050.00, 1260.00, 'en cours', 'non paye', NULL, 'public/pdfs/devis20.pdf', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);




INSERT INTO demande_inscriptions (enfant_id, activite_offre_id, demande_id,horaire1, horaire2, etat, motif, created_at, updated_at)
VALUES
    (1, 1, 1, '2024-05-08 08:00:00', '2024-05-08 10:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 2, 2, '2024-05-08 09:00:00', '2024-05-08 11:00:00', 'en cours', 'Paiement en cours', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 3, 3, '2024-05-08 10:00:00', '2024-05-08 12:00:00', 'en cours', 'Activité complète', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 4, 4, '2024-05-08 11:00:00', '2024-05-08 13:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 5, 5, '2024-05-08 12:00:00', '2024-05-08 14:00:00', 'en cours', 'En attente de confirmation', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 6, 6, '2024-05-08 13:00:00', '2024-05-08 15:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 7, 7, '2024-05-08 14:00:00', '2024-05-08 16:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 8, 8, '2024-05-08 15:00:00', '2024-05-08 17:00:00', 'en cours', 'Horaires incompatibles', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 9, 9, '2024-05-08 16:00:00', '2024-05-08 18:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 10, 10, '2024-05-08 17:00:00', '2024-05-08 19:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 11, 11, '2024-05-08 18:00:00', '2024-05-08 20:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 12, 12, '2024-05-08 19:00:00', '2024-05-08 21:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 13, 13, '2024-05-08 20:00:00', '2024-05-08 22:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 14, 14, '2024-05-08 21:00:00', '2024-05-08 23:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 15, 15, '2024-05-08 22:00:00', '2024-05-09 00:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 16, 16, '2024-05-08 23:00:00', '2024-05-09 01:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 17, 17, '2024-05-09 00:00:00', '2024-05-09 02:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 18, 18, '2024-05-09 01:00:00', '2024-05-09 03:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 19, 19, '2024-05-09 02:00:00', '2024-05-09 04:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 20, 20, '2024-05-09 03:00:00', '2024-05-09 05:00:00', 'en cours', 'Aucun', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO hdas (activite_offre_id, horaire_id, eff_min, eff_max, nbr_place_restant, created_at, updated_at)
VALUES
    (1, 1, 5, 10, 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 2, 8, 15, 10, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 3, 6, 12, 15, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 4, 7, 14, 8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 5, 9, 18, 5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 6, 10, 20, 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 7, 6, 12, 17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 8, 5, 10, 22, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 9, 8, 15, 18, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 10, 7, 14, 13, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 11, 9, 16, 25, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 12, 6, 12, 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 13, 8, 14, 16, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 14, 7, 15, 18, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 15, 10, 20, 11, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 16, 5, 11, 23, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 17, 8, 16, 19, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 18, 6, 13, 14, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 19, 7, 15, 21, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 20, 9, 18, 17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);


INSERT INTO hd_anims (anim_id, horaire_id, created_at, updated_at)
VALUES
    (1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 6, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 7, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 10, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 11, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 13, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 14, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 15, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 16, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 18, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 19, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO planning_anims (anim_id, activite_id, horaire_id, created_at, updated_at)
VALUES
    (1, 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (2, 2, 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (3, 3, 3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (4, 4, 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (5, 5, 5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (6, 6, 6, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (7, 7, 7, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (8, 8, 8, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (9, 9, 9, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (10, 10, 10, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (11, 11, 11, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (12, 12, 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (13, 13, 13, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (14, 14, 14, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (15, 15, 15, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (16, 16, 16, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (17, 17, 17, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (18, 18, 18, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (19, 19, 19, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
    (20, 20, 20, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO planning_enfs (enfant_id,activite_id, horaire_id) VALUES
                                                                         (1, 1, 1),
                                                                         (1, 1, 2),
                                                                         (1, 2, 3),
                                                                         (2, 1, 1),
                                                                         (2, 2, 2),
                                                                         (2, 2, 3),
                                                                         (3, 2, 1),
                                                                         (3, 1, 3),
                                                                         (3, 2, 3),
                                                                         (4, 1, 2),
                                                                         (4, 2, 1),
                                                                         (4, 1, 3),
                                                                         (5, 1, 1),
                                                                         (5, 2, 2),
                                                                         (5, 1, 2),
                                                                         (6, 2, 1),
                                                                         (6, 2, 3),
                                                                         (6, 1, 3),
                                                                         (7, 1, 1),
                                                                         (7, 2, 2);


