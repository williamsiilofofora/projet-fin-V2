CREATE TABLE forum_categorie(
        cat_id    Int (11) Auto_increment  NOT NULL ,
        cat_name  Varchar (50) NOT NULL ,
        cat_order Int (11) NOT NULL
	,CONSTRAINT forum_categorie_PK PRIMARY KEY (cat_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: forum_topic
#------------------------------------------------------------

CREATE TABLE forum_topic(
        topic_id   Int (11) Auto_increment  NOT NULL ,
        topic_name Varchar (55) NOT NULL ,
        topic_post Varchar (255) NOT NULL ,
        topic_desc Varchar (255) NOT NULL ,
        cat_id     Int NOT NULL
	,CONSTRAINT forum_topic_PK PRIMARY KEY (topic_id)

	,CONSTRAINT forum_topic_forum_categorie_FK FOREIGN KEY (cat_id) REFERENCES forum_categorie(cat_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: level
#------------------------------------------------------------

CREATE TABLE level(
        id_level Int (11) Auto_increment  NOT NULL ,
        id_label Varchar (200) NOT NULL
	,CONSTRAINT level_PK PRIMARY KEY (id_level)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: member
#------------------------------------------------------------

CREATE TABLE member(
        member_id        Int (11)  Auto_increment  NOT NULL ,
        member_pseudo    Varchar (255) NOT NULL ,
        member_password  Varchar (355) NOT NULL ,
        member_email     Varchar (155) NOT NULL ,
        member_avatar    Varchar (255) NULL ,
        member_signature Varchar (200) NULL ,
        id_level         Int (11) NOT NULL
	,CONSTRAINT member_PK PRIMARY KEY (member_id)

	,CONSTRAINT member_level_FK FOREIGN KEY (id_level) REFERENCES level(id_level)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: forum_post
#------------------------------------------------------------

CREATE TABLE forum_post(
        post_id      Int (11)  Auto_increment  NOT NULL ,
        post_name    Varchar (255) NOT NULL ,
        post_creator Varchar (255) NOT NULL ,
        post_date    Datetime NOT NULL ,
        post_alert   Int (11)NOT NULL ,
        topic_id     Int (11) NOT NULL ,
        member_id    Int (11) NOT NULL
	,CONSTRAINT forum_post_PK PRIMARY KEY (post_id)

	,CONSTRAINT forum_post_forum_topic_FK FOREIGN KEY (topic_id) REFERENCES forum_topic(topic_id)
	,CONSTRAINT forum_post_member0_FK FOREIGN KEY (member_id) REFERENCES member(member_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: forum_comment
#------------------------------------------------------------

CREATE TABLE forum_comment(
        comment_id    Int (11)  Auto_increment  NOT NULL ,
        comment_date  Datetime NOT NULL ,
        comment_alert Int (11) NOT NULL ,
        comment_title Varchar (50) NOT NULL ,
        post_id       Int (11) NOT NULL ,
        member_id     Int (11) NOT NULL
	,CONSTRAINT forum_comment_PK PRIMARY KEY (comment_id)

	,CONSTRAINT forum_comment_forum_post_FK FOREIGN KEY (post_id) REFERENCES forum_post(post_id)
	,CONSTRAINT forum_comment_member0_FK FOREIGN KEY (member_id) REFERENCES member(member_id)
)ENGINE=InnoDB;

