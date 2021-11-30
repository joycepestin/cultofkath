<?php
    class EducationalAttainment{
        public $id;
        public $candidate_name;
        public $description;

        function createEduc($conn, $candidate_name, $description){
            $sql = "INSERT INTO educational_attainment(candidate_name, description) VALUES('$candidate_name','$description')";
            return mysqli_query($conn, $sql);
        }

        function deleteEduc($conn, $id){
            $sql = "DELETE FROM educational_attainment WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function deleteAllEduc($conn, $candidate_name){
            $sql = "DELETE FROM educational_attainment WHERE candidate_name = $candidate_name";
            return mysqli_query($conn, $sql);
        }

        function getAllEduc($conn, $candidate_name){
            $sql = "SELECT * FROM educational_attainment WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>