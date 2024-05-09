<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="logo.png">
    <title>Movie Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 0 10px; /* Added padding for better responsiveness */
        }
        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Adjusted grid for responsiveness */
            grid-gap: 20px;
            margin-bottom: 20px;
        }
        .movie-grid img {
            width: 100%;
            border-radius: 5px;
        }
        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input[type="text"],
        textarea,
        select,
        input[type="submit"] {
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            opacity: 0.8;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #333;
            color: #fff;
        }

        .image-container img {
            transition: transform 0.3s ease-in-out;
        }
        .cube:hover {
            transform: scale(1.05);
        }

        /* Media queries for responsiveness */
        @media only screen and (max-width: 768px) {
            .container {
                width: 90%; /* Adjusted width for smaller screens */
            }
        }

        @media only screen and (max-width: 480px) {
            .movie-grid {
                grid-template-columns: 1fr; /* Switch to single column layout on smaller screens */
            }
        }
    </style>
</head>

<body>

<header>
    <h1>Movie Review</h1>
    <h5>Welcome, your ultimate destination for expertly curated reviews of the top 10 must-watch movies of every month, keeping you informed and entertained with the latest cinematic gems.</h5>
</header>

<div class="container">
    <div class="movie-grid">
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=g8zxiB5Qhsc&t=107s"><img src="monkey_man.png" alt="Movie Trailer 1">
            </a>
            <h4>1. Monkey Man</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=6L6XqWoS8tw"><img src="ms_dhoni.png" alt="Movie Trailer 2">
            </a>
            <h4>2. M.S.Dhoni</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=B7VP47oCZfE"><img src="madgaon_express.png" alt="Movie Trailer 3">
            </a>
            <h4>3. Madgaon Express</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=MWOlnZSnXJo"><img src="jawan.png" alt="Movie Trailer 4">
            </a>
            <h4>4. Jawan</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=A179apttY58"><img src="kashmir_files.png" alt="Movie Trailer 5">
            </a>
            <h4>5. Kashmir Files</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=Cg8sbRFS3zU"><img src="uri.png" alt="Movie Trailer 6">
            </a>
            <h4>6. URI</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=Nwce9WwkcMg"><img src="article_370.png" alt="Movie Trailer 7">
            </a>
            <h4>7. Article 370</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=4nwAra0mz_Q"><img src="bajrangi_bhaijaan.png" alt="Movie Trailer 8">
            </a>
            <h4>8. Bajrangi Bhaijaan</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=lAVYll_wBeY"><img src="fighter.png" alt="Movie Trailer 9">
            </a>
            <h4>9. Fighter</h4>
        </div>
        <div class="cube">
            <a href="https://www.youtube.com/watch?v=8FkLRUJj-o0"><img src="animal.png" alt="Movie Trailer 10">
            </a>
            <h4>10. Animal</h4>
        </div>
        <!-- Add more movie trailers as needed -->
    </div>
    <div>
    <form action="" method="POST">

        <label for="movie_name">Movie Name:</label>
        <input type="text" name="movie_name" id="movie_name" required>

        <label for="user_name">Your Name:</label>
        <input type="text" name="user_name" id="user_name" required>

        <label for="review">Review (within 40 words):</label>
        <textarea name="review" id="review" required></textarea>

        <label for="rating">Rating:</label>
        <select name="rating" id="rating" required>

            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select>

        <input type="submit" name="save_btn" value="Submit Review">
    </form>
    </div>

    <?php
    if(isset($_POST['save_btn'])){
        $mname=$_POST['movie_name'];
        $uname=$_POST['user_name'];
        $rev=$_POST['review'];
        $rating=$_POST['rating'];

    
    
    // Prepare and bind the statement
$stmt = $con->prepare("INSERT INTO reviews (movie_name, review_data, stars, user_name) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $mname, $rev, $rating, $uname);

// Set parameters and execute
$mname = $_POST['movie_name'];
$rev = $_POST['review'];
$rating = $_POST['rating'];
$uname = $_POST['user_name'];

$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo '<script type="text/javascript">alert("Review Submitted Successfully");</script>';
} else {
    echo '<script type="text/javascript">alert("Please Try Again");</script>';
}

// Close statement
$stmt->close();
}
    ?>

    <h2>Reviews</h2>

    <table>
        
            <tr>
                <th>Movie Name</th>
                <th>Critic Name</th>
                <th>Review</th>
                <th>Rating</th>
            </tr>
        
        <?php
        $query="SELECT * FROM reviews";
        $data=mysqli_query($con,$query);
        $result=mysqli_num_rows($data);
        if($result){
            while($row=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $row['movie_name'] ?></td>
                    <td><?php echo $row['user_name'] ?></td>
                    <td><?php echo $row['review_data'] ?></td>
                    <td><?php echo $row['stars'] ?></td>
                </tr>
                <?php
            }
        }
        else{
             ?>
                <tr>
                    <td>No Record Found</td>
                </tr>
             <?php
        }
        ?>
    </table>

</div>

</body>
</html>