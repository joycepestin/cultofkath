<?php
    class LegislativeWork{
        public $id;
        public $candidate_name;
        public $description;

        function createLegislativeWork($conn, $candidate_name, $description){
            $sql = "INSERT INTO legislative_works(candidate_name, description) VALUES('$candidate_name','$description')";
            return mysqli_query($conn, $sql);
        }

        function deleteLegislativeWork($conn, $id){
            $sql = "DELETE FROM legislative_works WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function updateLegislativeWork($conn, $id, $description){
            $sql = "UPDATE legislative_works SET description = '$description' WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function deleteAllLegislativeWorks($conn, $candidate_name){
            $sql = "DELETE FROM legislative_works WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }

        function getAllLegislativeWorks($conn, $candidate_name){
            $sql = "SELECT * FROM legislative_works WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>