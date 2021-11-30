<?php
    class EducationalAttainment{
        public $id;
        public $candidate_name;
        public $description;

        function createEducationalAttainment($conn, $candidate_name, $description){
            $sql = "INSERT INTO educational_attainment(candidate_name, description) VALUES('$candidate_name','$description')";
            return mysqli_query($conn, $sql);
        }

        function deleteEducationalAttainment($conn, $id){
            $sql = "DELETE FROM educational_attainment WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function deleteAllEducationalAttainments($conn, $candidate_name){
            $sql = "DELETE FROM educational_attainment WHERE candidate_name = $candidate_name";
            return mysqli_query($conn, $sql);
        }

        function getAllEducationalAttainments($conn, $candidate_name){
            $sql = "SELECT * FROM educational_attainment WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>