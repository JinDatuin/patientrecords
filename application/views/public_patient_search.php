<!-- Enhanced Custom CSS for Visibility and Sharp Edges -->
<style>
    :root {
        --med-green: #1cc88a;
        --dark-navy: #2c3e50;
        --border-color: #d1d5db;
        --focus-shadow: 0 0 0 4px rgba(28, 200, 138, 0.15);
    }

    body {
        background-color: #f3f4f6;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }

    /* Page Header */
    .header-accent {
        border-bottom: 4px solid var(--med-green);
        display: inline-block;
        padding-bottom: 5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* THE SEARCH BAR: High Visibility & Sharp Corners */
    .search-box-container {
        background: #ffffff;
        border: 2px solid var(--dark-navy); /* Thick visible border */
        border-radius: 4px; /* Slight edge, not round */
        display: flex;
        align-items: center;
        padding: 5px;
        transition: all 0.2s ease;
        box-shadow: 6px 6px 0px rgba(44, 62, 80, 0.1); /* Retro block shadow */
    }

    .search-box-container:focus-within {
        border-color: var(--med-green);
        box-shadow: 6px 6px 0px rgba(28, 200, 138, 0.2);
    }

    .search-input {
        border: none !important;
        box-shadow: none !important;
        font-weight: 600;
        color: var(--dark-navy);
        padding: 15px;
        border-radius: 0; /* Square corners for input */
    }

    /* Sharp Action Button */
    .btn-search-sharp {
        background-color: var(--med-green);
        color: white;
        border: none;
        border-radius: 2px; /* Sharp corners */
        padding: 12px 30px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: background 0.2s;
    }

    .btn-search-sharp:hover {
        background-color: #17a673;
        color: white;
    }

    /* Table with defined edges */
    .results-card {
        border: 1px solid var(--border-color);
        border-top: 5px solid var(--med-green);
        border-radius: 0; /* Boxy corners */
        background: white;
    }

    .table thead th {
        background-color: #f9fafb;
        border-bottom: 2px solid var(--border-color);
        color: var(--dark-navy);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.8rem;
    }

    .badge-case {
        background: #ebfef5;
        color: #065f46;
        border: 1px solid #a7f3d0;
        border-radius: 2px; /* Sharp corners */
        font-family: 'Courier New', monospace;
        font-weight: bold;
    }
</style>

<div class="container-fluid py-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="h2 text-gray-900 header-accent">Patient Database</h1>
        <p class="text-muted mt-2">Search records by Name, Surname, or Case Identification Number</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-9">
            
            <!-- HIGH VISIBILITY SEARCH BAR -->
            <div class="mb-5">
                <form action="<?php echo base_url('admissioncontrol/public_search'); ?>" method="GET">
                    <div class="search-box-container">
                        <div class="pl-3">
                            <i class="fas fa-search text-muted"></i>
                        </div>
                        <input type="text" name="query" 
                               class="form-control search-input bg-transparent" 
                               placeholder="ENTER SEARCH QUERY..." 
                               value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
                        <button class="btn btn-search-sharp" type="submit">
                            SEARCH RECORDS
                        </button>
                    </div>
                </form>
            </div>

            <!-- RESULTS -->
            <?php if(!empty($get_data)): ?>
                <div class="results-card shadow-sm">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="border-right">Case No.</th>
                                    <th>Patient Full Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Recorded Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($get_data as $patient): ?>
                                    <tr>
                                        <td class="align-middle border-right">
                                            <span class="badge-case px-2 py-1">
                                                P-0<?php echo $patient->pr_id; ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="font-weight-bold text-dark">
                                                <?php echo strtoupper($patient->pr_lname).', '.$patient->pr_fname; ?>
                                            </div>
                                        </td>
                                        <td class="align-middle text-uppercase small"><?php echo $patient->pr_gen; ?></td>
                                        <td class="align-middle"><?php echo $patient->pr_age; ?> <small class="text-muted">YRS</small></td>
                                        <td class="align-middle text-muted small"><?php echo $patient->pr_date; ?></td>
                                        <td class="text-center align-middle">
                                            <a href="<?php echo base_url('Admissioncontrol/patientdataview/'.$patient->pr_id); ?>" 
                                               class="btn btn-sm btn-dark px-3" style="border-radius: 0;">
                                                <i class="fas fa-eye mr-1"></i> VIEW RECORD
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            
            <?php elseif(isset($_GET['query'])): ?>
                <div class="alert alert-light border shadow-sm text-center py-4" style="border-radius: 0;">
                    <h4 class="text-danger font-weight-bold">NO RECORDS FOUND</h4>
                    <p class="mb-0">The search for "<strong><?php echo htmlspecialchars($_GET['query']); ?></strong>" returned 0 results in the database.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>