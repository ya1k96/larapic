CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;

CREATE TABLE users (
    id                  int(255) auto_increment not null,
    role                varchar(20),
    name                varchar(100),
    surname             varchar(200),
    nick                varchar(100),
    email               varchar(255),
    password            varchar(255),
    image               varchar(255),
    created_at          DATETIME,
    update_at           DATETIME,
    remember_token      VARCHAR(255),

    CONSTRAINT pk_users PRIMARY KEY(id)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS images(
    id                  int(255) auto_increment NOT NULL,
    user_id             int(255),
    image_path          varchar(255),
    created_at          datetime,
    updated_at          datetime,

    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS comments(
    id                  int(255) auto_increment NOT NULL,
    user_id             int(255),
    image_id            int(255),
    content             text,
    created_at          datetime,
    updated_at          datetime,

    CONSTRAINT pk_comments PRIMARY KEY(id),
    COONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
) ENGINE = InooDb;

CREATE TABLE IF NOT EXISTS images(
    id                  int(255) auto_increment NOT NULL,
    user_id             int(255),
    image_path          varchar(255),
    created_at          datetime,
    updated_at          datetime,

    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
) ENGINE = InnoDb;

CREATE TABLE IF NOT EXISTS likes(
    id                  int(255) auto_increment NOT NULL,
    user_id             int(255),
    image_id            int(255),
    content             text,
    created_at          datetime,
    updated_at          datetime,

    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)
) ENGINE = InooDb;

INSERT INTO users VALUES(null, 'user', 'Yamil', 'Martinez', 'Ya1k','yamil123_1@live.com', null, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(null, 'user', 'Juan', 'Martinez', 'JOHN','JOHN123_1@live.com', null, CURTIME(), CURTIME(), null);
INSERT INTO users VALUES(null, 'user', 'Manuel', 'Martinez', 'M4nolo','Manolo123_1@live.com', null, CURTIME(), CURTIME(), null);

INSERT INTO images VALUES(null, 1, 'test1.jpg', CURTIME(),CURTIME());
INSERT INTO images VALUES(null, 2, 'test2.jpg', CURTIME(),CURTIME());
INSERT INTO images VALUES(null, 3, 'test4.jpg', CURTIME(),CURTIME());

INSERT INTO comments VALUES(null, 1, 2, 'Buena foto de prueba', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 2, 1, 'Buena foto de prueba2', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 2, 1, 'Gracias padre', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 2, 1, 'Buena foto', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 1, 3, 'nice', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 3, 1, 'Me encanta!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(null, 3, 1, 'Estoy aprendiendo Laravel!', CURTIME(), CURTIME());

INSERT INTO likes VALUES(null, 1, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 1, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 1, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 2, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 2, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(null, 3, 1, CURTIME(), CURTIME());