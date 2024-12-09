-- CREATE DATABASE package_manager;

\c package_manager;

CREATE TABLE authors (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL
);

-- Create the packages table
CREATE TABLE packages (
    id SERIAL PRIMARY KEY,
    name VARCHAR(150) UNIQUE NOT NULL,
    description TEXT,
    creation_date DATE DEFAULT CURRENT_DATE,
    author_id INTEGER NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors(id)
);

-- Create the versions table
CREATE TABLE versions (
    id SERIAL PRIMARY KEY,
    package_id INTEGER NOT NULL,
    version_number VARCHAR(25) NOT NULL,
    release_date DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (package_id) REFERENCES packages(id)
);

-- Create the contributions table for multiple authors contributing to one package
CREATE TABLE contributions (
    package_id INTEGER NOT NULL,
    author_id INTEGER NOT NULL,
    PRIMARY KEY (package_id, author_id),
    FOREIGN KEY (package_id) REFERENCES packages(id),
    FOREIGN KEY (author_id) REFERENCES authors(id)
);

INSERT INTO authors (name, email) VALUES
('Alice Johnson', 'alice.johnson@example.com'),
('Bob Smith', 'bob.smith@example.com'),
('Charlie Brown', 'charlie.brown@example.com'),
('Diana Prince', 'diana.prince@example.com'),
('Ethan Hunt', 'ethan.hunt@example.com'),
('Fiona Gallagher', 'fiona.gallagher@example.com'),
('George Washington', 'george.washington@example.com'),
('Hannah Baker', 'hannah.baker@example.com'),
('Ian Malcolm', 'ian.malcolm@example.com'),
('Jasmine Lee', 'jasmine.lee@example.com');

INSERT INTO packages (name, description, creation_date, author_id) VALUES
('express', 'Fast, unopinionated, minimalist web framework for Node.js.', CURRENT_DATE, 1),
('lodash', 'A modern JavaScript utility library delivering modularity, performance, & extras.', CURRENT_DATE, 2),
('mongoose', 'MongoDB object modeling designed to work in an asynchronous environment.', CURRENT_DATE, 3),
('react', 'A JavaScript library for building user interfaces.', CURRENT_DATE, 4),
('axios', 'Promise based HTTP client for the browser and node.js.', CURRENT_DATE, 5),
('vue', 'The Progressive JavaScript Framework.', CURRENT_DATE, 6),
('next.js', 'The React Framework for Production.', CURRENT_DATE, 7),
('jQuery', 'A fast, small, and feature-rich JavaScript library.', CURRENT_DATE, 8),
('webpack', 'A static module bundler for modern JavaScript applications.', CURRENT_DATE, 9),
('typescript', 'A superset of JavaScript that compiles to clean JavaScript output.', CURRENT_DATE, 10);

INSERT INTO versions (package_id, version_number, release_date) VALUES
(1, '4.17.1', 2016-03-12),
(1, '4.17.2', 2020-12-05),
(2, '4.17.21', CURRENT_DATE),
(2, '4.17.22', 2012-08-16),
(3, '6.0.12', 2004-08-16),
(4, '17.0.2', CURRENT_DATE),
(5, '0.21.1', CURRENT_DATE),
(6, '2.6.14', CURRENT_DATE),
(7, '12.0.7', 2019-11-01),
(8, '3.6.0', CURRENT_DATE),
(9, '5.64.0', CURRENT_DATE),
(10, '4.5.5', CURRENT_DATE);

INSERT INTO contributions (package_id, author_id) VALUES
(1, 1), 
(1, 2), 
(2, 2), 
(2, 3), 
(3, 3), 
(4, 4), 
(5, 5), 
(6, 6),
(6, 2),
(2, 5),
(10, 6),
(2, 4),
(7, 7),
(8, 8), 
(9, 9),
(10, 10);




