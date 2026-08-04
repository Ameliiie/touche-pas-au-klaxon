USE touche_pas_au_klaxon;

-- --------------------------------------------------------
-- Agences
-- --------------------------------------------------------

INSERT INTO agencies (city) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');

-- --------------------------------------------------------
-- Utilisateurs
-- --------------------------------------------------------

INSERT INTO users (firstname, lastname, email, phone, password, role) VALUES
(
    'Admin',
    'TPAK',
    'admin@tpak.fr',
    '0102030405',
    '$2y$10$0zwrvCwtEWCqrpN3h1Atw.6pLSrxkFe6DzOImQujjqaiMurLvZ6fa',
    'admin'
),
(
    'Jean',
    'Dupont',
    'jean.dupont@email.fr',
    '0601020304',
    '$2y$10$0zwrvCwtEWCqrpN3h1Atw.6pLSrxkFe6DzOImQujjqaiMurLvZ6fa',
    'user'
),
(
    'Marie',
    'Martin',
    'marie.martin@email.fr',
    '0605060708',
    '$2y$10$0zwrvCwtEWCqrpN3h1Atw.6pLSrxkFe6DzOImQujjqaiMurLvZ6fa',
    'user'
);

-- --------------------------------------------------------
-- Trajets
-- --------------------------------------------------------

INSERT INTO trips (
    departure_agency_id,
    arrival_agency_id,
    departure_datetime,
    arrival_datetime,
    total_seats,
    available_seats,
    user_id
) VALUES

(1, 2, '2026-08-05 08:00:00', '2026-08-05 12:00:00', 4, 3, 2),

(2, 3, '2026-08-06 09:30:00', '2026-08-06 13:30:00', 5, 5, 2),

(3, 1, '2026-08-07 14:00:00', '2026-08-07 18:30:00', 4, 2, 3),

(4, 5, '2026-08-08 07:45:00', '2026-08-08 11:15:00', 3, 1, 3),

(6, 7, '2026-08-09 10:00:00', '2026-08-09 15:00:00', 6, 4, 2);