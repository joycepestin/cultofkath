<?php
    class Legislative{
        public $id;
        public $candidate_name;
        public $description;

        function createLegislatives($conn, $candidate_name, $description){
            $sql = "INSERT INTO legislative_works(candidate_name, description) VALUES('$candidate_name','$description')";
            return mysqli_query($conn, $sql);
        }

        function deleteLegislatives($conn, $id){
            $sql = "DELETE FROM legislative_works WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function deleteAllLegislatives($conn, $candidate_name){
            $sql = "DELETE FROM legislative_works WHERE candidate_name = $candidate_name";
            return mysqli_query($conn, $sql);
        }

        function getAllLegislatives($conn, $candidate_name){
            $sql = "SELECT * FROM legislative_works WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>