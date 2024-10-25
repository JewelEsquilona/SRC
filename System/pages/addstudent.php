<?php 
    include 'connection.php'; // Include the database connection file
    if(isset($_POST['submit'])){ // Check if the form is submitted
        
        $image = $_FILES['img']['name']; // Get the name of the uploaded image
        $tempname = $_FILES['img']['tmp_name'];  // Get the temporary name of the uploaded file
        $folder = "../assets/img/".$image; // Set the folder path for the uploaded image
        
        if(move_uploaded_file($tempname, $folder)){ // Move the uploaded file to the specified folder
            echo 'Image has been uploaded'; // Success message
        }

        // Get other form data
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
        $EnrollNumber = $_POST['EnrollNumber'];
        $DateOfAdmission = $_POST['DateOfAdmission'];

        // Prepare the SQL query to insert the data into the database
        $requete = $con->prepare("INSERT INTO students_list(img, Name, Email, Phone, EnrollNumber, DateOfAdmission) VALUES('$image', '$Name', '$Email', '$Phone', '$EnrollNumber', '$DateOfAdmission')");
        //$requete->execute(array($image, $Name, $Email, $Phone, $EnrollNumber, $DateOfAdmission)); // Alternative execution method
        $requete->execute(); // Execute the query
    }
    header('location:graduates_list.php'); // Redirect to the students list page
?>
