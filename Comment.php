<?php
    class Comment{
        public $id;
        public $username;
        public $candidate_name;
        public $comment;

        function createComment($conn, $username, $candidate_name, $comment){
            $sql = "INSERT INTO comments(username, comment, candidate_name) VALUES('$username','$comment','$candidate_name')";
            return mysqli_query($conn, $sql);
        }

        function deleteComment($conn, $id){
            $sql = "DELETE FROM comments WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function deleteAllComments($conn, $candidate_name){
            $sql = "DELETE FROM comments WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }

        function getAllComments($conn, $candidate_name){
            $sql = "SELECT * FROM comments WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>