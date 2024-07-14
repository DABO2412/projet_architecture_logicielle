<?php 

class ArticleDAO{
    protected $db;
    function __construct(){
            $this->db = MyPDO::getInstance();
        }
        function __destruct()
        {
            $this->db = null;
        }
        function list(){
            $articles=[];
            $request="SELECT * from article ";
            $query = $this->db->query($request)->fetchAll(PDO::FETCH_ASSOC);
            foreach($query as $row){
                $article = new Article($row['id'], $row['titre'], $row['contenu'],$row['dateCreation'], $row['dateModification'], $row['categorie']);
                $article->hydrate($row);
                array_push($articles, $article);
            }
            return $articles;
        }
}