<style>
    /* Reset & Base Styles */
    .patient-record-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #5a5c69;
        background-color: #f8f9fc;
        padding: 20px;
    }

    .text-center { text-align: center; }
    .text-uppercase { text-transform: uppercase; }
    .text-success { color: #1cc88a; }
    .text-secondary { color: #858796; }

    /* Layout Grid */
    .header-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .main-content {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 20px;
    }

    /* Card Component */
    .custom-card {
        background: #fff;
        border-radius: 5px;
        border-left: 4px solid #1cc88a;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        padding: 1.25rem;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
        padding: 0.75rem 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
    }

    /* Detail Styles */
    .detail-item {
        margin-bottom: 15px;
    }

    .label-xs {
        font-size: 0.7rem;
        font-weight: bold;
        color: #1cc88a;
    }

    .value-h5 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #4e73df;
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, th, td {
        border: 1px solid #e3e6f0;
    }

    th, td {
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #f8f9fc;
        color: #4e73df;
    }

    /* Alerts */
    .alert {
        padding: 15px;
        background-color: #d1e7dd;
        color: #0f5132;
        border-radius: 4px;
        margin-bottom: 20px;
        text-align: center;
    }
</style>

<div class="patient-record-container">
    <h1 class="text-center">Patient Records</h1>

    <!-- Header Section -->
    <div class="header-row">
        <div class="custom-card" style="flex: 2;">
            <div class="label-xs text-uppercase">Patient Name</div>
            <div class="value-h5">
                <?php echo $get_data->pr_lname . ", " . $get_data->pr_fname . " " . $get_data->pr_mname; ?>
            </div>
        </div>

        <div class="custom-card" style="flex: 1;">
            <div class="label-xs text-uppercase">Clinic Case No.</div>
            <div class="value-h5">
                <?php echo "P-0".$get_data->pr_id ?>
            </div>
        </div>
    </div>

    <div class="main-content">
        <!-- Sidebar: Details -->
        <aside>
            <div class="custom-card" style="padding: 0;">
                <div class="card-header">
                    <span class="text-success">Details</span>
                    <!--<a href="<?php echo base_url() . 'admissioncontrol/patient_edit_option/' . $get_data->pr_id; ?>" class="text-secondary">
                        Edit ✎
                    </a>-->
                </div>
                <div style="padding: 20px;">
                    <?php if($this->session->flashdata('patientrecordoption_updated')): ?>  
                        <div class="alert"><?php echo $this->session->flashdata('patientrecordoption_updated'); ?></div>
                    <?php endif; ?>

                    <div class="detail-item">
                        <div class="label-xs text-secondary text-uppercase">Address</div>
                        <div class="value-h5"><?php echo $get_data->pr_addrs; ?></div>
                    </div>

                    <div class="detail-item">
                        <div class="label-xs text-secondary text-uppercase">Age</div>
                        <div class="value-h5"><?php echo $get_data->pr_age; ?></div>
                    </div>

                    <div class="detail-item">
                        <div class="label-xs text-secondary text-uppercase">Gender</div>
                        <div class="value-h5"><?php echo $get_data->pr_gen; ?></div>
                    </div>

                    <div class="detail-item">
                        <div class="label-xs text-secondary text-uppercase">Occupation</div>
                        <div class="value-h5"><?php echo $get_data->pr_occup; ?></div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Area: Findings & Admission -->
        <section>
            <!-- OPD Findings -->
            <div class="custom-card" id="findings" style="padding: 0;">
                <div class="card-header">
                    <span class="text-success">OPD Findings</span>
                    <!--<a href="<?php echo base_url() . 'admissioncontrol/add_findings/' . $get_data->pr_id . '#findings'; ?>" class="text-secondary">+</a>-->
                </div>
                <div style="padding: 20px;">
                    <table>
                        <thead>
                            <tr>
                                <th>History of Present Illness</th>
                                <th>Date Consulted</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($get_findings_data as $findings): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url() . '#' . $findings->pr_findings_id; ?>" style="color:green; font-weight:bold; text-decoration:none;">
                                        <?php echo $findings->f_historypresentillness; ?>
                                    </a>
                                </td>
                                <td><?php echo $findings->f_date; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Admission History -->
            <div class="custom-card" id="admission" style="padding: 0;">
                <div class="card-header">
                    <span class="text-success">Admission History</span>
                    <!--<a href="<?php echo base_url() . '#' . $get_data->pr_id . '#admission'; ?>" class="text-secondary">+</a>-->
                </div>
                <div style="padding: 20px;">
                    <table>
                        <thead>
                            <tr>
                                <th>Ward Admitted</th>
                                <th>Admission Date</th>
                                <th>Discharge Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($get_admission_data as $admission): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url() . '#' . $admission->pr_admission_id; ?>" style="color:green; font-weight:bold; text-decoration:none;">
                                        <?php echo $admission->ad_wardname; ?>
                                    </a>
                                </td>
                                <td><?php echo $admission->ad_date; ?></td>
                                <td><?php echo $admission->ad_dischargedate; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>