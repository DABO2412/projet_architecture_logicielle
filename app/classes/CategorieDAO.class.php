<?php 

class CategorieDAO{
    protected $db;
    function __construct(){
            $this->db = MyPDO::getInstance();
        }
        function __destruct()
        {
            $this->db = null;
        }
        function list(){
            $categories=[];
            $request="SELECT * from categorie ";
            $query = $this->db->query($request)->fetchAll(PDO::FETCH_ASSOC);
            foreach($query as $row){
                $categorie = new Categorie($row['id'], $row['libelle']);
                $categorie->hydrate($row);
                array_push($categories, $categorie);
            }
            return $categories;
        }
}