<?php

namespace forum\models;
use forum\models\connect;

class ForumManager extends Connect
{
    public function getForumStation()
    {
        $db = $this->dbConnect();
        $forum = $db->prepare('SELECT *
        FROM forum_topic 
        WHERE cat_id = 1 
        ORDER BY topic_id');
        $forum->execute(array()); 
        return $forum;
    }
    public function getForumNoManSSky()
    {
        $db = $this->dbConnect();
        $forum2 = $db->prepare('SELECT *
        FROM forum_topic 
        WHERE cat_id = 2 
        ORDER BY topic_id');
        $forum2->execute(array()); 
        return $forum2;
    }
    public function getForumNoManSSkyCom()
    {
        $db = $this->dbConnect();
        $forum3 = $db->prepare('SELECT *
        FROM forum_topic 
        WHERE cat_id = 3
        ORDER BY topic_id');
        $forum3->execute(array()); 
        return $forum3;
    }
    public function getForumAutres()
    {
        $db = $this->dbConnect();
        $forum4 = $db->prepare('SELECT *
        FROM forum_topic 
        WHERE cat_id = 4 
        ORDER BY topic_id');
        $forum4->execute(array()); 
        return $forum4;
    }
    public function getPosts($id){
        $db = $this->dbconnect();
        $posts = $db->prepare('SELECT * FROM forum_post 
        INNER JOIN forum_topic
        ON forum_post.topic_id = forum_topic.topic_id
        WHERE forum_topic.cat_id = ? 
        ORDER BY forum_post.topic_id');
        $posts->execute(array($id));
        return $posts;
    }
    public function countPost($id){
        $db = $this->dbconnect();
        $countPosts = $db->prepare('SELECT COUNT(post_id) 
        AS countP 
        FROM forum_post 
        WHERE topic_id=?');
        $countPosts->execute(array($id));
        $countPost = $countPosts->fetch();    
        return $countPost['countP'];
    }
    public function countComment($id){
        $db = $this->dbconnect();
        $cComments = $db->prepare('SELECT COUNT(gc.comment_id)
        AS countC
        FROM forum_topic p
        JOIN forum_post c ON c.topic_id = p.topic_id
        JOIN forum_comment gc ON gc.post_id = c.post_id
        WHERE p.topic_id = ?');
        $cComments->execute(array($id)); 
        $countComment = $cComments->fetch();     
        return $countComment['countC'];
    }
     
    public function lastPost($id){
        $db =$this->dbconnect();
        $lastPost=$db->prepare('SELECT * from forum_post
        WHERE topic_id =?
        ORDER BY post_date
        DESC LIMIT 0,1');
        $lastPost->execute(array($id));
        $lastPosts = $lastPost->fetch();
        return $lastPosts;
    }
   
    public function getComment($id){
        $db = $this->dbconnect();
        $comment = $db->prepare('SELECT * FROM forum_comment
        INNER JOIN forum_post on forum_post.post_id = forum_comment.post_id
        INNER JOIN member on member.member_id = forum_comment.member_id
        WHERE forum_post.post_id = ?
        ORDER BY comment_date');
        $comment->execute(array($id));
        return $comment;
    }
        public function tForum($id){
        $db = $this->dbconnect();
        $TForum = $db->prepare('SELECT * FROM forum_categorie
        LEFT JOIN forum_topic on forum_categorie.cat_id=forum_topic.cat_id
        WHERE forum_topic.cat_id =?');
        $TForum->execute(array($id));
        return $TForum;
    }
    /* public function forum(){
        $db = $this->dbconnect();
        $forum = $db->query('SELECT * FROM forum_categorie
        LEFT JOIN forum_topic on forum_categorie.cat_id=forum_topic.cat_id
        LEFT JOIN forum_post on forum_topic.topic_id = forum_post.topic_id
        LEFT JOIN forum_comment on forum_post.post_id = forum_comment.post_id
        LEFT JOIN member on member.member_pseudo= forum_post.post_creator
        LEFT JOIN level on member.id_level = level.id_level');
        return $forum;
    }*/

    public function incrementAlertComment($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE forum_comment SET comment_alert = comment_alert + 1 WHERE id = :id');
        $successC = $req->execute(array(
            "id" => $id
        ));
                
        return $successC;
    }
    public function incrementAlertPost($id) {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE forum_post SET post_alert = post_alert + 1 WHERE id = :id');
        $successP = $req->execute(array(
            "id" => $id
        ));
                
        return $successP;
    }
    public function deleteComment($id){
        $db = $this->dbConnect();
        $req =$db->prepare(' DELETE FROM `forum_comment` WHERE `forum_comment`.`comment_id` =?');
        $delete =$req->execute(array($id));       
        return $delete;
        }
    public function editComment($id){
        $db = $this->dbConnect();
        $req =$db->prepare('ALTER content FROM comment WHERE id=? ');
    }

      
}

  
