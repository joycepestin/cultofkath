<?php
    require_once('Award.php');
    require_once('Achievement.php');
    require_once('EducationalAttainment.php');
    require_once('LegislativeWork.php');
    class Candidate{
        public $id;
        public $candidate_name;
        public $description;
        public $full_name;
        public $image_url;

        function createCandidate($conn, $candidate_name, $description, $full_name, $image_url){
            $sql = "INSERT INTO candidates(candidate_name, description, full_name, image_url) VALUES('$candidate_name','$description', '$candidate_name', '$image_url')";
            return mysqli_query($conn, $sql);
        }

        function deleteCandidate($conn, $id){
            $award = new Award;
            $achievement = new Achievement;
            $educational = new EducationalAttainment;
            $legislative = new LegislativeWork;
            $sql = "DELETE FROM candidates WHERE id = $id";
            $award->deleteAllAwards($conn,$id);
            $achievement->deleteAllAchievements($conn,$id);
            $educational->deleteAllEducationalAttainments($conn,$id);
            $legislative->deleteAllLegislativeWorks($conn,$id);
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

        function updateCandidate($conn, $id, $full_name, $description, $image_url){
            $sql = "UPDATE candidates SET full_name = '$full_name', description = '$description', full_name = '$full_name', image_url = '$image_url' WHERE id = $id";
            return mysqli_query($conn, $sql);
        }

        function getCandidateByName($conn, $candidate_name){
            $sql = "SELECT * FROM candidates WHERE full_name = '$candidate_name'";
            return mysqli_query($conn, $sql);
        }
    }
?>