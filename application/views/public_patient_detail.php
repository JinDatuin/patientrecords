<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Medical Record: <?php echo $patient->pr_lname; ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Personal Information</h5>
                    <p><strong>Case No:</strong> P-0<?php echo $patient->pr_id; ?></p>
                    <p><strong>Gender:</strong> <?php echo $patient->pr_gen; ?></p>
                    <p><strong>Age:</strong> <?php echo $patient->pr_age; ?></p>
                </div>
                <div class="col-md-6">
                    <h5>Record Details</h5>
                    <p><strong>Date Recorded:</strong> <?php echo $patient->pr_date; ?></p>
                </div>
            </div>
            <hr>
            <h5>Medical Findings & Remarks</h5>
            <div class="alert alert-secondary">
                <?php echo !empty($patient->pr_findings) ? nl2br($patient->pr_findings) : "No findings available for this record."; ?>
            </div>
            
            <a href="javascript:history.back()" class="btn btn-secondary">Back to Search</a>
        </div>
    </div>
</div>