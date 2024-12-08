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
('Docteur Abdolah', 'monsieur@docteur.com'),
('Eve Martin', 'eve@modulemaster.com'),
('Frank White', 'frank@npmhub.com'),
('Grace Lee', 'grace@opensource.dev'),
('Hannah Young', 'hannah@npmcore.com'),
('Ian Brown', 'ian@devtools.com');

-- insert data into packages table
INSERT INTO packages (name, description) VALUES
('TailwindCSS', 'Tranform the way you write css into utility classes'),
('FNL', 'Listen to music while coding in your IDE'),
('FaceCheck', 'A Face checker in your code that describes your current state'),
('Webpack', 'A static module bundler for modern JavaScript applications'),
('Vue.js', 'A progressive JavaScript framework for building user interfaces'),
('Moment.js', 'A library for parsing, validating, manipulating, and formatting dates'),
('Jest', 'A delightful JavaScript testing framework with a focus on simplicity'),
('Chalk', 'Terminal string styling done right');

-- insert data into versions table
INSERT INTO versions (package_id, version_number, release_date) VALUES
(1, '1.0.0', DEFAULT),
(1, '1.1.0', DEFAULT),
(2, '2.0.0', DEFAULT),
(3, '3.0.0', DEFAULT),
(4, '5.75.0', DEFAULT),
(4, '5.74.0', '2023-10-01'),
(5, '3.2.47', DEFAULT),
(6, '2.29.4', DEFAULT),
(7, '29.6.1', DEFAULT),
(7, '29.5.0', '2023-08-15'),
(8, '5.3.0', DEFAULT);

-- insert data into author_package table
INSERT INTO author_package (author_id, package_id) VALUES
(1, 1),(1, 2),(2, 1),(2, 3),
(3, 2),(3, 3),(1, 4),(2, 4),
(3, 5),(4, 6), (5, 7), (6, 8),
(5, 5),(7, 6),(8, 7),(2, 8);



