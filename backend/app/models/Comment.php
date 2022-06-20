<?php 

class Comment 
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getallCommentsByLawyerId($lawyer_id)
    {
        $this->db->query('SELECT c.id,c.content,c.created_at,cl.fname,cl.lname,cl.photo
                          FROM comments c,clients cl
                          WHERE c.idClient = cl.id
                          AND idLawyer = :lawyer_id
                          ORDER BY c.created_at DESC');
        $this->db->bind(':lawyer_id', $lawyer_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function add($data)
    {
        $this->db->query('INSERT INTO comments (content,idLawyer, idClient) VALUES(:content,:idLawyer, :idClient)');
        // Bind values
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':idLawyer', $data['idLawyer']);
        $this->db->bind(':idClient', $data['idClient']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}