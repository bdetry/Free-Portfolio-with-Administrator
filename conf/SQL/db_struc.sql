#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: ARTICLE 
#------------------------------------------------------------

CREATE TABLE ARTICLE(
        `id`         int (11) Auto_increment  NOT NULL ,
        `date_publie` Date NOT NULL ,
        `titre`       Varchar (20) NOT NULL ,
        `desc_rip`    Longtext ,
        `img_src`     Text ,
        `id_ADMIN`    Int NOT NULL ,
        PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ADMIN
#------------------------------------------------------------

CREATE TABLE ADMIN(
        `id`      int (11) Auto_increment  NOT NULL ,
        `nom`     Varchar (25) NOT NULL ,
        `login`   Varchar (25) ,
        `pass`    Varchar (25) NOT NULL ,
        `log`     Longtext ,
        `id_ROLE` Int NOT NULL ,
        PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ROLE
#------------------------------------------------------------

CREATE TABLE ROLE(
        `id`  int (11) Auto_increment  NOT NULL ,
        `niv` Int NOT NULL ,
        `nom` Varchar (20) NOT NULL ,
        PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SUJET_INFO
#------------------------------------------------------------

CREATE TABLE SUJET_INFO(
        `id`          int (11) Auto_increment  NOT NULL ,
        `info1`       Varchar (25) ,
        `info2`       Varchar (25) ,
        `cv_src`      Varchar (25) ,
        `array_liens` Longtext ,
        `id_ARTICLE`  Int NOT NULL ,
        PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SERVICES
#------------------------------------------------------------

CREATE TABLE SERVICES(
        `id`         int (11) Auto_increment  NOT NULL ,
        `id_ARTICLE` Int NOT NULL ,
        PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: REALISATION
#------------------------------------------------------------

CREATE TABLE REALISATION(
        `id`          int (11) Auto_increment  NOT NULL ,
        `lien_src`    Varchar (25) ,
        `lien_title`  Varchar(25) ,
        `id_ARTICLE`  Int NOT NULL ,
        PRIMARY KEY (id)
)ENGINE=InnoDB;

ALTER TABLE ARTICLE ADD CONSTRAINT FK_ARTICLE_id_ADMIN FOREIGN KEY (id_ADMIN) REFERENCES ADMIN(id);
ALTER TABLE ADMIN ADD CONSTRAINT FK_ADMIN_id_ROLE FOREIGN KEY (id_ROLE) REFERENCES ROLE(id);
ALTER TABLE SUJET_INFO ADD CONSTRAINT FK_SUJET_INFO_id_ARTICLE FOREIGN KEY (id_ARTICLE) REFERENCES ARTICLE(id);
ALTER TABLE SERVICES ADD CONSTRAINT FK_SERVICES_id_ARTICLE FOREIGN KEY (id_ARTICLE) REFERENCES ARTICLE(id);
ALTER TABLE REALISATION ADD CONSTRAINT FK_REALISATION_id_ARTICLE FOREIGN KEY (id_ARTICLE) REFERENCES ARTICLE(id);
