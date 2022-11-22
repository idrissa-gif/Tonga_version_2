<?php

//submit_rating.php

include("connection.php");

if (isset($_POST["rating_data"])) {

    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_review = $_POST["user_review"];
    $rate = $_POST["rating_data"];
    $target = $_POST["target"];
    $datetime = time();


    $query = "
	INSERT INTO `tblreview`(`reviewer_name`, `review_email`, `user_review`, `rate`, `target`, `datetime`) 
	                VALUES (:user_name, :user_email, :user_review, :rate , :target , :datetime)
	";

    $statement = $dbh->prepare($query);

    $statement->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $statement->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $statement->bindParam(':user_review', $user_review, PDO::PARAM_STR);
    $statement->bindParam(':rate', $rate, PDO::PARAM_INT);
    $statement->bindParam(':target', $target, PDO::PARAM_STR);
    $statement->bindParam(':datetime', $datetime, PDO::PARAM_INT);

    $statement->execute();
}

if (isset($_POST["action"])) {

    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();
    $target = $_POST["target"];


    $query = "
	SELECT * FROM tblreview WHERE target='$target'
	ORDER BY review_id DESC
	";
    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_array($result)) {
        $review_content[] = array(
            'user_name'        =>    $row["reviewer_name"],
            'user_review'    =>    $row["user_review"],
            'rating'        =>    $row["rate"],
            'datetime'        =>    date('l jS, F Y h:i:s A', $row["datetime"])
        );

        if ($row["rate"] == '5') {
            $five_star_review++;
        }

        if ($row["rate"] == '4') {
            $four_star_review++;
        }

        if ($row["rate"] == '3') {
            $three_star_review++;
        }

        if ($row["rate"] == '2') {
            $two_star_review++;
        }

        if ($row["rate"] == '1') {
            $one_star_review++;
        }

        $total_review++;

        $total_user_rating = $total_user_rating + $row["rate"];
    }

    $average_rating = $total_user_rating / $total_review;

    $output = array(
        'average_rating'    =>    number_format($average_rating, 1),
        'total_review'        =>    $total_review,
        'five_star_review'    =>    $five_star_review,
        'four_star_review'    =>    $four_star_review,
        'three_star_review'    =>    $three_star_review,
        'two_star_review'    =>    $two_star_review,
        'one_star_review'    =>    $one_star_review,
        'review_data'        =>    $review_content
    );
    echo json_encode($output);
}
