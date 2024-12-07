-- CREATE DATABASE package_manager;

\c package_manager;

CREATE TABLE authors (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE
);

CREATE TABLE packages (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    description TEXT,
    creation_date DATE DEFAULT CURRENT_DATE
);

CREATE TABLE versions (
    id SERIAL PRIMARY KEY,
    package_id INTEGER,
    version_number VARCHAR(25),
    release_date DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (package_id) REFERENCES packages(id)
);

-- joined table for m2m relationship between authors and packages
CREATE TABLE author_package (
    author_id INTEGER,
    package_id INTEGER,
    PRIMARY KEY (author_id, package_id),
    FOREIGN KEY (author_id) REFERENCES authors(id),
    FOREIGN KEY (package_id) REFERENCES packages(id)
);

-- insert data into authors table
INSERT INTO authors (name, email) VALUES
('Taha Ostora', 'taha@ostore.com'),
('Jad Bozo', 'jad@k3k3.com'),
('Docteur Abdolah', 'monsieur@docteur.com');

-- insert data into packages table
INSERT INTO packages (name, description) VALUES
('TailwindCSS', 'Tranform the way you write css into utility classes'),
('FNL', 'Listen to music while coding in your IDE'),
('FaceCheck', 'A Face checker in your code that describes your current state');

-- insert data into versions table
INSERT INTO versions (package_id, version_number, release_date) VALUES
(1, '1.0.0', DEFAULT),
(1, '1.1.0', DEFAULT),
(2, '2.0.0', DEFAULT),
(3, '3.0.0', DEFAULT);

-- insert data into author_package table
INSERT INTO author_package (author_id, package_id) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 2),
(3, 3);


-- SELECT 
--     a.id AS author_id,
--     a.name AS author_name,
--     a.email AS author_email,
--     p.id AS package_id,
--     p.name AS package_name,
--     p.description AS package_description,
--     p.creation_date AS package_creation_date,
--     v.id AS version_id,
--     v.version_number AS version_number,
--     v.release_date AS version_release_date
-- FROM 
--     authors a
-- JOIN 
--     author_package ap ON a.id = ap.author_id
-- JOIN 
--     packages p ON ap.package_id = p.id
-- LEFT JOIN 
--     versions v ON p.id = v.package_id
-- WHERE 
--     p.id = 1;


