<?php
    include_once 'header.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./CSS/styles.css">
    <link rel="stylesheet" href="./CSS/error.css">

</head>
<body class="light-mode">
    <div class="main-content">
        <div class="error-container">
            <div class="error-message">
                OOPS! 
                <?php 
                    if(isset($_GET['title'])){
                        echo htmlspecialchars($_GET['title']);
                    }
                    else {
                        echo "Something went wrong!";
                    }
                ?>
            </div>

            <div class="error-description">
                <?php
                    if(isset($_GET['message'])){
                        echo htmlspecialchars($_GET['message']);
                    }
                    else {
                        echo "The page you are looking for might have been removed, had its name changed or is temporarily unavailable.";
                    }
                ?>
            </div>
            <a href="javascript:goBack();" class="btn-home">Go Back</a>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
    <?php include_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="./JS/script.js"></script>
</body>


</html>