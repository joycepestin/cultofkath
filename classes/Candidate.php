<?php
    require_once('Award.php');
    require_once('Achievement.php');
    class Candidate{
        public $id;
        public $candidate_name;
        public $full_name;
        public $description;

        function createCandidate($conn, $candidate_name, $description, $full_name){
            $sql = "INSERT INTO candidates(candidate_name, description, full_name) VALUES('$candidate_name','$description', '$candidate_name')";
            return mysqli_query($conn, $sql);
        }

        function deleteCandidate($conn, $id){
            $award = new Award;
            $achievement = new Achievement;
            $sql = "DELETE FROM candidates WHERE id = $id";
            $award->deleteAllAwards($conn,$id);
            $achievement->deleteAllAchievements($conn,$id);
            return mysqli_query($conn, $sql);
        }

        function deleteCandidateByName($conn, $candidate_name){
            $award = new Award;
            $achievement = new Achievement;
            $sql = "DELETE FROM candidates WHERE candidate_name = $candidate_name";
            $award->deleteAllAwards($conn,$candidate_name);
            $achievement->deleteAllAchievements($conn,$candidate_name);
            return mysqli_query($conn, $sql);
        }

        function getAllCandidates($conn){
            $sql = "SELECT * FROM candidates";
            return mysqli_query($conn, $sql);
        }

        function getCandidate($conn, $id){
            $sql = "SELECT * FROM candidates WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function updateCandidate($conn, $id, $full_name, $description){
            $sql = "UPDATE candidates SET full_name = '$full_name', description = '$description' WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function getCandidateByName($conn, $candidate_name){
            $sql = "SELECT * FROM candidates WHERE full_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>