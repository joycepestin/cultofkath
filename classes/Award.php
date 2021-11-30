<?php
    class Award{
        public $id;
        public $candidate_name;
        public $description;

        function createAward($conn, $candidate_name, $description){
            $sql = "INSERT INTO awards(candidate_name, description) VALUES('$candidate_name','$description')";
            return mysqli_query($conn, $sql);
        }

        function deleteAward($conn, $id){
            $sql = "DELETE FROM awards WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function deleteAllAwards($conn, $candidate_name){
            $sql = "DELETE FROM awards WHERE candidate_name = $candidate_name";
            return mysqli_query($conn, $sql);
        }

        function getAllAwards($conn, $candidate_name){
            $sql = "SELECT * FROM awards WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>