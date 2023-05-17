<?php
include("fyprodbconnection.php");
session_start();
if (!isset($_SESSION['loggedin'])) {
	include("header.php");
}
else
	include("header(loggedin).php");

// Handle form submission
if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $rating = $_POST['rating'];

    // Check if the question is not empty
    if (!empty($question)) {
        // Insert the feedback into the FAQ table
        $insert_faq_sql = "INSERT INTO faq (question, rating) VALUES ('$question', '$rating')";
        mysqli_query($connect, $insert_faq_sql);

        // Display success message
        $notification = "Thank you for your feedback! Your question has been submitted.";

        // Clear the form fields
        $_POST['question'] = '';
        $_POST['rating'] = '';
    } else {
        // Display error message if question is empty
        $notification = "Please provide a question.";
    }
}

// Retrieve customer feedback history
$fetch_faq_sql = "SELECT * FROM faq";
$result_faq = mysqli_query($connect, $fetch_faq_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>FAQ - Customer Feedback</title>
    <link rel="stylesheet" href="FAQ.css">
</head>
<body>
    <h1>FAQ - Customer Feedback</h1>
    <div class="feedback-container">
        <div class="feedback-form">
            <form action="" method="post">
                <div class="form-group">
                    <label for="question">Suggestion:</label>
                    <textarea name="question" rows="4" required><?php echo isset($_POST['question']) ? $_POST['question'] : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select name="rating" required>
                        <option value="">Select rating</option>
                        <option value="1">1 star</option>
                        <option value="2">2 stars</option>
                        <option value="3">3 stars</option>
                        <option value="4">4 stars</option>
                        <option value="5">5 stars</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="submit-button">Submit</button>
                </div>
            </form>
            <?php if (isset($notification)) { ?>
                <p class="notification"><?php echo $notification; ?></p>
            <?php } ?>
        </div>

        <div class="feedback-history">
            <h2>Customer Feedback History</h2>
            <?php if (mysqli_num_rows($result_faq) > 0) { ?>
                <ul>
                    <?php while ($row_faq = mysqli_fetch_assoc($result_faq)) { ?>
                        <li>
                            <strong>Question:</strong> <?php echo $row_faq['question']; ?><br>
                            <strong>Rating:</strong>
                            <?php
                                $rating = $row_faq['rating'];
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<span class="star-filled">&#9733;</span>';
                                    } else {
                                        echo '<span class="star-empty">&#9733;</span>';
                                    }
                                }
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p>No customer feedback available.</p>
            <?php } ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
