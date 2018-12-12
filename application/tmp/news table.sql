CREATE TABLE news (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        text text NOT NULL,
        date_publish timestamp NOT NULL,
        lifetime int(10) NOT NULL,
        PRIMARY KEY (id),
        KEY slug (slug)
);
