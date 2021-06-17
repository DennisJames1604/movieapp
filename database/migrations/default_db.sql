
-- DROP TABLE IF EXISTS movies;

-- CREATE TABLE movies(
--     id INT PRIMARY KEY AUTO_INCREMENT,
--     movie_title VARCHAR(128) NOT NULL,
--     movie_description TEXT NOT NULl
-- );

-- DROP TABLE IF EXISTS movie_ratings;

-- CREATE TABLE movie_ratings(
--     id INT PRIMARY KEY AUTO_INCREMENT,
--     movie_id INT NOT NULL,
--     FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
-- );

DROP TABLE IF EXISTS users;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    two_factor_secret TEXT,
    two_factor_recovery_codes TEXT,
    remember_token VARCHAR(255),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS failed_jobs;

CREATE TABLE failed_jobs (
    uuid VARCHAR(255) NOT NULL UNIQUE,
    connection TEXT NOT NULL,
    queue TEXT NOT NULL,
    payload LONGTEXT NOT NULL,
    exception LONGTEXT NOT NULL,
    failed_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS password_resets;

CREATE TABLE password_resets(
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
