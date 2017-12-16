SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS child (
  child_id int(11) NOT NULL AUTO_INCREMENT,
  child_name varchar(255) NOT NULL,
  parent_id int(11) NOT NULL,
  PRIMARY KEY (child_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

INSERT INTO child (child_id, child_name, parent_id) VALUES
(1, 'Peter', 1),
(2, 'Anna', 1),
(3, 'Boris', 2),
(4, 'Maria', 3),
(5, 'Lili', 3),
(6, 'Nikole', 4),
(7, 'Anastasija', 5),
(8, 'Georgi', 6),
(9, 'Erik', 7),
(10, 'Sergej', 7),
(11, 'Ho', 8),
(12, 'Andy', 9);

CREATE TABLE IF NOT EXISTS discipline (
  discipline_id int(11) NOT NULL AUTO_INCREMENT,
  discipline_name varchar(255) NOT NULL,
  PRIMARY KEY (discipline_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO discipline (discipline_id, discipline_name) VALUES
(1, 'Mathematics'),
(2, 'English'),
(3, 'Russian'),
(4, 'Biology'),
(5, 'Chemistry'),
(6, 'Sport'),
(7, 'Art'),
(8, 'Phisics'),
(9, 'Philosophy'),
(10, 'Law');

CREATE TABLE IF NOT EXISTS parent (
  parent_id int(11) NOT NULL AUTO_INCREMENT,
  parent_name varchar(255) NOT NULL,
  PRIMARY KEY (parent_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO parent (parent_id, parent_name) VALUES
(1, 'Ivan'),
(2, 'Peter'),
(3, 'Michael'),
(4, 'Alla'),
(5, 'Julija'),
(6, 'Anton'),
(7, 'Mihal'),
(8, 'Chen Hu'),
(9, 'Frank');

CREATE TABLE IF NOT EXISTS score (
  score_id int(11) NOT NULL AUTO_INCREMENT,
  child_id int(11) NOT NULL,
  discipline_id int(11) NOT NULL,
  score int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (score_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

INSERT INTO score (score_id, child_id, discipline_id, score, `date`) VALUES
(1, 1, 1, 3, '2011-08-01'),
(2, 1, 2, 5, '2011-08-01'),
(3, 1, 3, 4, '2011-08-02'),
(4, 1, 5, 2, '2011-08-02'),
(5, 1, 6, 5, '2011-08-03'),
(6, 1, 6, 4, '2011-08-03'),
(7, 2, 1, 3, '2011-08-01'),
(8, 2, 2, 2, '2011-08-01'),
(9, 2, 7, 5, '2011-08-04'),
(10, 2, 6, 4, '2011-08-03'),
(11, 3, 3, 4, '2011-08-02'),
(12, 3, 9, 2, '2011-08-01'),
(13, 3, 9, 3, '2011-08-05'),
(14, 4, 6, 2, '2011-08-04'),
(15, 4, 8, 5, '2011-08-03'),
(16, 4, 8, 5, '2011-08-05'),
(17, 5, 6, 2, '2011-08-04'),
(18, 5, 6, 5, '2011-08-05'),
(19, 6, 2, 4, '2011-08-03'),
(20, 6, 7, 3, '2011-08-06'),
(21, 6, 5, 5, '2011-08-04'),
(22, 6, 8, 4, '2011-08-07'),
(23, 6, 10, 2, '2011-08-04'),
(24, 7, 1, 4, '2011-08-03'),
(25, 7, 4, 4, '2011-08-07'),
(26, 8, 4, 3, '2011-08-05'),
(27, 8, 1, 2, '2011-07-27'),
(28, 9, 10, 5, '2011-08-02'),
(29, 9, 10, 5, '2011-08-05'),
(30, 9, 8, 2, '2011-08-02'),
(31, 9, 8, 5, '2011-08-05'),
(32, 10, 1, 4, '2011-08-03'),
(33, 10, 9, 4, '2011-08-04'),
(34, 10, 10, 3, '2011-08-05'),
(35, 11, 3, 3, '2011-08-03'),
(36, 11, 6, 3, '2011-08-04'),
(37, 12, 8, 4, '2011-08-02'),
(38, 12, 6, 4, '2011-08-05'),
(39, 1, 2, 4, '2011-07-04');
