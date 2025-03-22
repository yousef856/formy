<?php
include 'includes/auth.php';
redirectToLogin();

$uploadDir = "uploads/";

function uploadFile($file, $type) {
    global $uploadDir;

    $fileName = basename($file['name']);
    $filePath = $uploadDir . $type . "_" . uniqid() . "_" . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        return $filePath;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
        $profilePicturePath = uploadFile($_FILES['profilePicture'], "profile");
    }

    if ($_FILES['medicalDocuments']['error'] === UPLOAD_ERR_OK) {
        $medicalDocumentsPath = uploadFile($_FILES['medicalDocuments'], "medical");
    }

    // Update database
    include 'includes/db_connect.php';

    $beneficiaryID = $_SESSION['beneficiaryID'];

    $stmt = $conn->prepare("UPDATE Beneficiaries SET ProfilePicture = ?, MedicalDocuments = ? WHERE BeneficiaryID = ?");
    $stmt->bind_param("ssi", $profilePicturePath, $medicalDocumentsPath, $beneficiaryID);

    if ($stmt->execute()) {
        echo "Files uploaded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>