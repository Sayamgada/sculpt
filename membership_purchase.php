<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Membership - Sculpt Premium Fitness Gym</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./CSS/styles.css">
    <link rel="stylesheet" href="./CSS/membership.css">

</head>

<body class="light-mode">

    <?php include_once 'header.php'; ?>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Choose Your Membership Plan</h2>
            <div class="accent-line mx-auto"></div>
        </div>

        <form id="membership-form">
            <!-- Plan Selection -->
            <div class="row g-4 mb-5">
                <!-- Basic Plan -->
                <div class="col-md-4">
                    <div class="plan-card" data-plan="quaterly" data-price="399">
                        <h4 class="text-uppercase fw-bold mb-3">Quaterly</h4>
                        <div class="mb-3">
                            <span class="plan-currency">₹</span>
                            <span class="plan-price">399</span>
                        </div>
                        <ul class="plan-features">
                            <li class="feature-available mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>3 Months membership</li>
                            <li class="feature-available mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                            <li class="feature-available mb-2"><i class="bi bi-x-circle-fill me-2 text-muted"></i>Nutrition Plan</li>
                        </ul>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="col-md-4">
                    <div class="plan-card popular selected" data-plan="half-yearly" data-price="699">
                        <div class="popular-badge">Most Popular</div>
                        <h4 class="text-uppercase fw-bold mb-3">Half-yearly</h4>
                        <div class="mb-3">
                            <span class="plan-currency">₹</span>
                            <span class="plan-price">699</span>
                        </div>
                        <ul class="plan-features">
                            <li class="feature-available mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>6 Months membership</li>
                            <li class="feature-available mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                            <li class="feature-available mb-2"><i class="bi bi-x-circle-fill me-2 text-muted"></i>Nutrition Plan</li>
                        </ul>
                    </div>
                </div>

                <!-- Elite Plan -->
                <div class="col-md-4">
                    <div class="plan-card" data-plan="yearly" data-price="999">
                        <h4 class="text-uppercase fw-bold mb-3">yearly</h4>
                        <div class="mb-3">
                            <span class="plan-currency">₹</span>
                            <span class="plan-price">999</span>
                        </div>
                        <ul class="plan-features">
                            <li class="feature-available mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>3 Months membership</li>
                            <li class="feature-available mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Unlimited access to all videos</li>
                            <li class="feature-available mb-2"><i class="bi bi-check-circle-fill me-2 accent-color"></i>Nutrition Plan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <input type="hidden" id="selected-plan" name="selected-plan" value="half-yearly">
            <input type="hidden" id="selected-price" name="selected-price" value="699">

            <?php
            $name = $_SESSION['name'];
            $fname = explode(' ', $name)[0];
            $lname = explode(' ', $name)[1];
            ?>

            <!-- Personal and Payment Details -->
            <div class="form-container">
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-3">Personal Details</h4>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" value="<?php echo $fname; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" value="<?php echo $lname; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" required value="<?php echo $_SESSION['email']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" value="<?php echo $_SESSION['phone']; ?>" readonly>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-3">Payment Details</h4>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded">
                            <div>
                                <p class="mb-0">Selected Plan: <span id="plan-name" class="fw-bold">Half-yearly</span></p>
                                <p class="mb-0">Monthly Fee: ₹<span id="monthly-fee">699</span></p>
                                <p class="mb-0">Registration Fee: ₹500</p>
                                <p class="mb-0 fw-bold mt-2">Total Amount: ₹<span id="total-amount">1199</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsConditions" checked required style="pointer-events: none;">
                            <label class="form-check-label" for="termsConditions">
                                I agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Complete Purchase</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include_once 'footer.php'; ?>

    <!-- Limit Reached Modal -->
    <div class="modal fade" id="limitModal" tabindex="-1" aria-labelledby="limitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="limitModalLabel">Transaction Successful</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Your membership has been confirmed. You have now unlimited access to all contents on the portal.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./JS/script.js"></script>

    <script>
        let limitmodal;

        document.addEventListener('DOMContentLoaded', function() {
            limitModal = new bootstrap.Modal(document.getElementById('limitModal'));
        });

        // Plan Selection
        const planCards = document.querySelectorAll('.plan-card');
        const selectedPlanInput = document.getElementById('selected-plan');
        const selectedPriceInput = document.getElementById('selected-price');
        const planNameDisplay = document.getElementById('plan-name');
        const monthlyFeeDisplay = document.getElementById('monthly-fee');
        const totalAmountDisplay = document.getElementById('total-amount');


        planCards.forEach(card => {
            card.addEventListener('click', function() {

                planCards.forEach(c => c.classList.remove('selected'));

                this.classList.add('selected');

                const plan = this.getAttribute('data-plan');
                const price = this.getAttribute('data-price');
                selectedPlanInput.value = plan;
                selectedPriceInput.value = price;

                planNameDisplay.textContent = plan.charAt(0).toUpperCase() + plan.slice(1);
                monthlyFeeDisplay.textContent = price;
                totalAmountDisplay.textContent = parseInt(price) + 500;
            });
        });


        document.getElementById('membership-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const selectedPlan = selectedPlanInput.value;

            const formData = new FormData();
            formData.append('selectedPlan', selectedPlan);

            fetch('membership_confirmation.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => {
                    if (!res.ok) throw new Error('Network response was not ok');
                    return res.text();
                })
                .then(text => {
                    try {
                        const data = JSON.parse(text);
                        if (data.success) {
                            limitModal.show();
                            setTimeout(() => {
                                window.location.href = 'profile.php';
                            }, 3000);
                        } 
                        else {
                            alert('Error: ' + data.message);
                        }
                    } catch (err) {
                        console.error('Invalid JSON:', text);
                        alert('Unexpected server response. Please try again.');
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                });

        });
    </script>
</body>

</html>