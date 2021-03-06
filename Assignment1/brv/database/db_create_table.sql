CREATE TABLE IF NOT EXISTS Author (
	id INTEGER PRIMARY KEY,
	full_name VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS Category (
	id INTEGER PRIMARY KEY,
	name VARCHAR(15) NOT NULL
);

CREATE TABLE IF NOT EXISTS Book (
	id INTEGER PRIMARY KEY,
	title VARCHAR(20) NOT NULL,
	cover VARCHAR(20) DEFAULT '',
	published DATE DEFAULT '',
	description VARCHAR(100),
	Category_id INTEGER NOT NULL REFERENCES Category(id),
	Author_id INTEGER NOT NULL REFERENCES Author(id)
);

CREATE TABLE IF NOT EXISTS User (
	id INTEGER PRIMARY KEY,
	nick_name VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS Review (
	id INTEGER PRIMARY KEY,
	rating INT NOT NULL,
	message TEXT,
	Book_id INTEGER NOT NULL REFERENCES Book(id),
	User_id INTEGER NOT NULL REFERENCES User(id)
);