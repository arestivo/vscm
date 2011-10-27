DROP TABLE partof;
DROP TABLE participation;
DROP TABLE contest;
DROP TABLE submission;
DROP TABLE problem;
DROP TABLE user;

CREATE TABLE user (
	username VARCHAR PRIMARY KEY,
	realname VARCHAR,
	latstid INTEGER
);

CREATE TABLE problem (
	code VARCHAR PRIMARY KEY
);

CREATE TABLE submission (
	sid INTEGER PRIMARY KEY,
	username VARCHAR  NOT NULL REFERENCES user,
	code VARCHAR REFERENCES problem,
	stamp INTEGER NOT NULL,
	language VARCHAR,
	result VARCHAR NOT NULL
);

CREATE TABLE contest (
	cid INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR NOT NULL UNIQUE,
	start INTEGER NOT NULL,
	stop INTEGER NOT NULL
);

CREATE TABLE participation (
	username VARCHAR REFERENCES user, 
	cid INTEGER REFERENCES contest,
	PRIMARY KEY (username, cid)
);

CREATE TABLE partof (
	cid INTEGER REFERENCES contest,
	code VARCHAR REFERENCES problem,
	PRIMARY KEY (cid, code)
);

INSERT INTO user VALUES('mogers', 'Miguel Oliveira', NULL);
INSERT INTO user VALUES('arestivo', 'André Restivo', NULL);
INSERT INTO user VALUES('miguelaraujo', 'Miguel Araújo', NULL);
INSERT INTO user VALUES('ivotimoteo', 'Ivo Timóteo', NULL);
INSERT INTO user VALUES('cristo', 'João Xavier', NULL);
INSERT INTO user VALUES('andresp', 'André Susano Pinto', NULL);
INSERT INTO user VALUES('andre_santos', 'André Santos', NULL);
INSERT INTO user VALUES('jcazevedo', 'João Azevedo', NULL);
INSERT INTO user VALUES('hugopeixoto', 'Hugo Peixoto', NULL);

INSERT INTO contest VALUES(NULL, 'Qualificação SWERC 2011', 1319803200, 1319817600);

INSERT INTO problem VALUES('CANDY');
INSERT INTO problem VALUES('AE1B');
INSERT INTO problem VALUES('COINS');
INSERT INTO problem VALUES('SCUBADIV');
INSERT INTO problem VALUES('BUGLIFE');
INSERT INTO problem VALUES('WORDS1');
INSERT INTO problem VALUES('HERDING');

INSERT INTO partof VALUES(1,'CANDY');
INSERT INTO partof VALUES(1,'AE1B');
INSERT INTO partof VALUES(1,'COINS');
INSERT INTO partof VALUES(1,'SCUBADIV');
INSERT INTO partof VALUES(1,'BUGLIFE');
INSERT INTO partof VALUES(1,'WORDS1');
INSERT INTO partof VALUES(1,'HERDING');
