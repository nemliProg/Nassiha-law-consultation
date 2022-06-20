<?php
class CommentsController extends Controller
{
    public function __construct()
    {
        $this->commentModel = $this->model('Comment');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
    }

    public function addComment()
    {
        header('Acces-Control-Allow-Methods: POST');
        header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');

        $data = [
            'content' => $_POST['content'],
            'idLawyer' => $_POST['idLawyer'],
            'idClient' => $_POST['idClient'],
        ];

        if (!empty($data['content']) && !empty($data['idLawyer']) && !empty($data['idClient'])) {
            if ($this->commentModel->add($data)) {
                $arr = array(
                    'message' => 'Comment created'
                );
                echo json_encode($arr);
            } else {
                $arr = array(
                    'message' => 'something went wrong'
                );
                echo json_encode($arr);
            }
        } else {
            $arr = array(
                'message' => 'incomplete information'
            );
            echo json_encode($arr);
        }

    }

    public function getAllCommentsByLawyerId($id)
    {

        if (!empty($id)) {
            $comments = $this->commentModel->getallCommentsByLawyerId($id);
            echo json_encode($comments);
        } else {
            $arr = array(
                'message' => 'incomplete information'
            );
            echo json_encode($arr);
        }
    }


}