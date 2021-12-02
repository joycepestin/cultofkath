<?php
    class Achievement{
        public $id;
        public $candidate_name;
        public $description;

        function createAchievement($conn, $candidate_name, $description){
            $sql = "INSERT INTO achievements(candidate_name, description) VALUES('$candidate_name','$description')";
            return mysqli_query($conn, $sql);
        }

        function deleteAchievement($conn, $id){
            $sql = "DELETE FROM achievements WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function updateAchievement($conn, $id, $description){
            $sql = "UPDATE achievements SET description = '$description' WHERE id = $id";
            return mysqli_query($conn, $sql);
        }


        function deleteAllAchievements($conn, $candidate_name){
            $sql = "DELETE FROM achievements WHERE candidate_name = $candidate_name";
            return mysqli_query($conn, $sql);
        }

        function getAllAchievements($conn, $candidate_name){
            $sql = "SELECT * FROM achievements WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>