USE news;

CREATE TABLE IF NOT EXISTS members (
    username VARCHAR(100) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT false,
    last_viewed int DEFAULT 0
);

CREATE TABLE IF NOT EXISTS posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_date TIMESTAMP DEFAULT NOW() NOT NULL,
    username VARCHAR(100) NOT NULL,
    title VARCHAR(255) NOT NULL,
    post TEXT NOT NULL,
    category VARCHAR(255) NOT NULL,
    audience INT NOT NULL,
    CONSTRAINT FOREIGN KEY (username) REFERENCES
    members(username) ON DELETE CASCADE
);
