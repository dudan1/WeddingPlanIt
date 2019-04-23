<?php
session_start();
require 'db.php';
$sp_id= mysqli_real_escape_string($connection,$_GET['sp_id']);

echo"<div class = grid-container>";
      echo" <div class = 'grid-100'>";
           echo "<div class ='review-container'>";

                $sql = " select r.review_id, r.review_title, r.review_score , r.review_text, r.review_date, c.first_name, c.surname 
                        from reviews r JOIN customer c ON r.SP_ID = '$sp_id' AND c.C_ID = r.C_ID";

                if ($result = mysqli_query($connection, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $score = $row['review_score'];
                            if($score ==1){
                                $image = "<img src = 'assets/images/1_star.PNG' alt = '1_star' height = '15px'>";
                            }
                            elseif($score ==2){
                                $image = "<img src = 'assets/images/2_stars.PNG' alt = '2_star' height = '15px'>";
                            }
                            elseif($score ==3){
                                $image = "<img src = 'assets/images/3_stars.PNG' alt = '3_star' height = '15px'>";
                            }
                            elseif($score ==4){
                                $image = "<img src = 'assets/images/4_stars.PNG' alt = '4_star' height = '15px'>";
                            }
                            elseif($score ==5){
                                $image = "<img src = 'assets/images/5_stars.PNG' alt = '5_star' height = '15px'>";
                            }

                            echo "<div class='review'>";
                            echo "<h3>{$row['review_title']} &nbsp;&nbsp;&nbsp;&nbsp; {$image} </h3>";;
                            echo "<p>{$row['review_text']}</p>";
                            echo "<p>{$row['first_name']} {$row['surname']}<br>{$row['review_date']}</p></div>";
                            echo"<form action='PHP_database_insert/admin_delete_review.php' method='post'><input type='hidden' name='bad_review' id='bad_review' value='{$row['review_id']}'>";
                            echo "<button type='submit'>Delete Review</button></form>";
                        }
//free result set
                        mysqli_free_result($result);
                    }else{
                        echo "No records matching your query were found.";
                    }
                }

            echo"  </div>";
        echo"  </div>";
  echo"  </div>";
?>