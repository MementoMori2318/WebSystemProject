CREATE TABLE comments (
	cid int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) NOT NULL,
    date datetime NOT NULL,
    message TEXT NOT NULL
);