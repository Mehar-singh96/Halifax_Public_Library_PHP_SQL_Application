DROP TABLE if exists BOOKS;
#
create table if not exists BOOKS (
  book_id bigint(20) not null,
  bookName varchar(30) not null,
  primary key(book_id),
  foreign key(book_id) references ITEM(_id)
) engine = innodb;

DROP TABLE if exists VOLUMES;
#
create table if not exists VOLUMES (
  mag_id int(11) not null,
  vol_no bigint(20) not null,
  publication_yr int(20) not null,
  primary key(mag_id,vol_no),
  foreign key(mag_id) references MAGAZINE(_id)
) engine = innodb;

DROP TABLE if exists ARTICLES;
#
create table if not exists ARTICLES (
 article_id bigint(20) not null auto_increment,
  mag_id int(11) not null,
  vol_no bigint(20) not null,
  title nvarchar(1000) not null,
  page_num varchar(20) ,
  primary key(article_id),
  foreign key(mag_id,vol_no) references VOLUMES(mag_id,vol_no),
  CONSTRAINT title_unique UNIQUE (title)
) engine = innodb;

DROP TABLE if exists PUBLISHED;
#
create table if not exists PUBLISHED (
 article_id bigint(20) not null,
  author_id int(11) not null,
  primary key(article_id,author_id),
  foreign key(article_id) references ARTICLES(article_id),
  foreign key(author_id) references AUTHOR(_id)
) engine = innodb;

DROP TABLE if exists CUSTOMERS;
#
create table if not exists CUSTOMERS (
	cid bigint(20) not null,
  tel_no varchar(20),
  fname varchar(30),
  lname varchar(30),
  discount_code float(10),
  mailing_Address varchar(50),
  primary key(cid)
) engine = innodb;

DROP TABLE if exists TRANSACTIONS;
#
create table if not exists TRANSACTIONS (
	trans_no bigint(20) not null,
  trans_date varchar(20),
  trans_price float(30),
  cid bigint(20),
  primary key(trans_no),
  foreign key(cid) references CUSTOMERS(cid)
) engine = innodb;

DROP TABLE if exists ITEM_TRANSACTION;
#
create table if not exists ITEM_TRANSACTION (
	trans_no bigint(20) not null,
  item_id bigint(20),
    quantity bigint(20),
  primary key(trans_no,item_id),
  foreign key(trans_no) references TRANSACTIONS(trans_no),
  foreign key(item_id) references ITEM(_id)
) engine = innodb;
DROP TABLE if exists EMP_PAY;
#
create table if not exists EMP_PAY (
	sin bigint(20) not null,
  payPerHr float(20),
     primary key(sin)
) engine = innodb;

DROP TABLE if exists EMP_HOURS;
#
create table if not exists EMP_HOURS (
	sin bigint(20) not null,
  _year varchar(20),
    mon varchar(20),
    total_hours bigint(20),
  primary key(sin,_year,mon),
  foreign key(sin) references EMP_PAY(sin)
) engine = innodb;

DROP TABLE if exists MONTHLY_EXP;
#
create table if not exists MONTHLY_EXP
(_year varchar(20),
mon varchar(20),
heat float(20),
water float(20),
electricity float(20),
emppay float(20),
primary key(_year,mon)
);
DROP TABLE if exists RENT;
#
create table if not exists RENT (
  _year varchar(20),
    rent float(20),
  primary key(_year),
  foreign key(_year) references MONTHLY_EXP(_year)
) engine = innodb;

