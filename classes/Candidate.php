<?php
    class Candidate{
        public $id;
        public $candidate_name;
        public $description;

        function createCandidate($conn, $candidate_name, $description){
            $sql = "INSERT INTO candidates(candidate_name, description) VALUES('$candidate_name','$description')";
            return mysqli_query($conn, $sql);
        }

        function deleteCandidate($conn, $id){
            $sql = "DELETE FROM candidates WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function deleteCandidateByName($conn, $candidate_name){
            $sql = "DELETE FROM candidates WHERE candidate_name = $candidate_name";
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

        function getCandidateByName($conn, $candidate_name){
            $sql = "SELECT * FROM candidates WHERE candidate_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>