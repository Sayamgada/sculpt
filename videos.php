<?php
include_once 'header.php';
include_once './db_connect.php';

// Get the muscle group from the URL parameter
$muscleId = isset($_GET['muscleId']) ? $_GET['muscleId'] : '';

$sql = "SELECT * FROM muscle_videos WHERE muscle_group_id = '$muscleId'";
$result = mysqli_query($conn, $sql);

$query = "SELECT * FROM muscle_group WHERE muscle_id = '$muscleId'";
$res = mysqli_query($conn, $query);
$muscleGroup = mysqli_fetch_assoc($res);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sculpt</title>

    <link rel="shortcut icon" href="./Images/fav.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./CSS/styles.css">
    <link rel="stylesheet" href="./CSS/videos.css">
</head>

<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark' ? 'dark-mode' : 'light-mode'; ?>">

    <div class="container mt-5 mb-5" style="padding-top: 6rem !important;">

        <div class="section-header text-center mb-5">
            <h6 class="text-uppercase fw-bold accent-color">Training Videos</h6>
            <h2 class="fw-bold"><?= $muscleGroup['muscle_name']; ?> Workout Videos</h2>
            <div class="accent-line mx-auto"></div>
            <p class="mt-3">Explore our collection of <?= $muscleGroup['muscle_name']; ?> training videos to help you achieve your fitness goals.</p>
        </div>

        <?php if (empty($result)): ?>
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-triangle me-2"></i>
                No videos found for this muscle group. Please try another category.
            </div>
            <div class="text-center mt-4">
                <a href="index.php#training" class="btn btn-primary">Back to Training</a>
            </div>
        <?php else: ?>

            <div class="row g-4 video-grid">

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($video = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="video-card">
                                <div class="video-thumbnail" onclick="openVideoModal('<?= $video['video_url'] ?>', '<?= addslashes($video['video_name']) ?>')">
                                    <img src="./Images/muscle_groups/<?= $muscleGroup['muscle_image']; ?>" alt="<?= $video['video_name']; ?>" class="img-fluid">
                                    <div class="play-button">
                                        <i class="bi bi-play-circle-fill"></i>
                                    </div>
                                </div>
                                <div class="video-info">
                                    <h5><?php echo $video['video_name']; ?></h5>
                                    <p class="video-channel">Sculpt Fitness</p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <div class="text-center mt-5">
                <a href="index.php#training" class="btn btn-outline-primary">Back to Training</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Video Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="/placeholder.svg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Limit Reached Modal -->
    <div class="modal fade" id="limitModal" tabindex="-1" aria-labelledby="limitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="limitModalLabel">Limit Reached</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">You have reached your video viewing limit. Please upgrade your plan or check back later.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" onclick="purchase_membership()">Upgrade Plan</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="./JS/script.js"></script>

    <?php
    $video_count = 0;
    if (isset($_SESSION['id'])) {
        $sql = "SELECT * FROM users WHERE user_id = " . $_SESSION['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $video_count = $row['video_count'];
    }
    ?>
    <script>
        let videoModal;
        let limitModal;

        document.addEventListener('DOMContentLoaded', function() {
            videoModal = new bootstrap.Modal(document.getElementById('videoModal'), {
                backdrop: 'static',
                keyboard: false
            });

            limitModal = new bootstrap.Modal(document.getElementById('limitModal'));

            document.getElementById('videoModal').addEventListener('hidden.bs.modal', function() {
                document.getElementById('videoFrame').src = '/placeholder.svg';
            });
        });

        function openVideoModal(videoUrl, videoTitle) {
            fetch('decrease_video_count.php')
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const frame = document.getElementById('videoFrame');
                        const title = document.getElementById('videoModalLabel');

                        frame.src = videoUrl;
                        title.textContent = videoTitle;

                        videoModal.show();
                    } else {
                        limitModal.show();
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                });
        }

        function purchase_membership() {
            window.location.href = 'membership_purchase.php';
        }
    </script>


    <!-- <script src="./JS/videos.js"></script> -->
    <?php include_once 'footer.php'; ?>
</body>

</html>