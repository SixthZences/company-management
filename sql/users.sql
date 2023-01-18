DROP TABLE IF EXISTS users;

CREATE TABLE users (

    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(100) DEFAULT 'employee',
    user_id INT ZEROFILL NOT NULL,
   created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME
);

INSERT INTO users (

    name,
    username,
    password,
    role,
) VALUES (

    'SixthZ',
    'patipansixth',
    '123',
    'admin'
);