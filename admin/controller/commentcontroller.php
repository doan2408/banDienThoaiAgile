<?php
class CommentController
{
    private $commentModel;

    function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    function listComments()
    {
        $comments = $this->commentModel->getAllComments();
        require_once "view/listcomments.php";
    }

    function toggleCensorship($id_comment, $current_status)
    {
        $new_status = $current_status == 0 ? 1 : 0;
        if ($this->commentModel->updateCensorship($id_comment, $new_status)) {
            header("Location: ?act=listComments");
        } else {
            echo "Cập nhật trạng thái thất bại";
        }
    }

    function deleteComment($id_comment)
    {
        if ($this->commentModel->deleteComment($id_comment)) {
            header("Location: ?act=listComments");
        } else {
            echo "Xóa bình luận thất bại";
        }
    }
}
