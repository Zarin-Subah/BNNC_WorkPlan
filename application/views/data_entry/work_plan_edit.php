<style>
    .select_members,
    .upload_resolution,
    .select_changed_members,
    .budget_section {
        display: none;
    }

    .table td,
    .table th {
        font-size: 12px;
        text-align: center;
    }

    .custom-input {
        width: 80px;
    }

    .custom-input-2 {
        width: 40px;
    }

    .custom-select-1 {
        width: 60px;
    }

    .custom-select-2 {
        width: 90px;
    }

    .table td,
    .table th {
        padding: 0.25rem;
        vertical-align: middle;
        border-top: 1px solid #e9ecef;
    }

    .form-group {
        margin-bottom: 0rem;
    }

    body {
        zoom: 90%;
    }

    .monthpicker_input {
        height: 38px !important;
        color: black !important;
        background-color: white !important;
    }

    input[readonly] {
        background-color: #dedbd5;
    }

    .add-button {
        background-color: green;
        color: white;
        padding: 3px;
        margin: 10px;
        border: 1px solid #000;
    }

    .add-button:hover,
    .add-button:active,
    .add-button:link,
    .add-button:visited {
        color: yellow;
    }
</style>
<script>
    //Code for Add Row
    function addRow(tableID) {

        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var serial_number = rowCount;

        var cell1 = row.insertCell(0);
        cell1.innerHTML = rowCount - 1;

        var cell2 = row.insertCell(1);
        var element1 = document.createElement("select");
        element1.name = "activity[]";
        element1.id = "activity" + serial_number;
        element1.setAttribute("onchange", "javascript:getSubActivity(this.value," + serial_number + ")");
        element1.setAttribute("class", "custom-select-2");
        <?php
        $activity_id_array = "";
        $activity_array = "";
        foreach ($major_activities as $activity) {
            $activity_id_array .= "'" . $activity['id'] . "',";
            $activity_array .= "'" . str_replace("'", "", $activity['activity_name']) . "',";
        }
        $activity_id_array = substr($activity_id_array, 0, -1);
        $activity_array = substr($activity_array, 0, -1);
        ?>
        var option_id_array = [<?php echo $activity_id_array; ?>];
        var option_array = [<?php echo $activity_array; ?>];
        var option = document.createElement("option");
        option.value = "";
        option.text = "Select";
        element1.setAttribute("required", "yes");
        element1.appendChild(option);
        for (var i = 0; i < option_array.length; i++) {
            option = document.createElement("option");
            option.value = option_id_array[i];
            option.text = option_array[i];
            element1.appendChild(option);
        }
        cell2.appendChild(element1);


        var cell3 = row.insertCell(2);
        var element2 = document.createElement("select");
        element2.name = "sub_activity[]";
        element2.id = "sub_activity" + serial_number;
        element2.setAttribute("onchange", "javascript:getIndicator(this.value," + serial_number + ")");
        element2.setAttribute("class", "custom-select-2");
        var option = document.createElement("option");
        option.value = "";
        option.text = "Select";
        element2.setAttribute("required", "yes");
        element2.appendChild(option);
        cell3.appendChild(element2);


        var cell4 = row.insertCell(3);
        var element3 = document.createElement("select");
        element3.name = "indicator[]";
        element3.id = "indicator" + serial_number;
        element3.setAttribute("class", "custom-select-2");
        var option = document.createElement("option");
        option.value = "";
        option.text = "Select";
        element3.setAttribute("required", "yes");
        element3.appendChild(option);
        cell4.appendChild(element3);


        var cell5 = row.insertCell(4);
        var element4 = document.createElement("input");
        element4.type = "number";
        element4.name = "baseline[]";
        element4.id = "baseline" + serial_number;
        element4.setAttribute("class", "custom-input");
        element4.setAttribute("required", "yes");
        element4.setAttribute("min", "0");
        cell5.appendChild(element4);


        var cell6 = row.insertCell(5);
        var element5 = document.createElement("input");
        element5.type = "number";
        element5.name = "target_value[]";
        element5.id = "target_value" + serial_number;
        element5.setAttribute("class", "custom-input");
        element5.setAttribute("required", "yes");
        element5.setAttribute("min", "0");
        cell6.appendChild(element5);



        var cell7 = row.insertCell(6);
        var element6 = document.createElement("select");
        var option_array = ["Y"];
        var option = document.createElement("option");
        option.value = "N";
        option.text = "N";
        element6.appendChild(option);
        for (var i = 0; i < option_array.length; i++) {
            option = document.createElement("option");
            option.value = option_array[i];
            option.text = option_array[i];
            element6.appendChild(option);
        }
        element6.name = "quarter1[]";
        element6.setAttribute("onchange", "javascript:quarter_value(this.value," + serial_number + ",1)");
        element6.setAttribute("required", "yes");
        element6.id = "quarter1" + serial_number;
        //New Element in same td
        var element21 = document.createElement("input");
        element21.type = "number";
        element21.name = "quarter1_value[]";
        element21.id = "quarter1_value" + serial_number;
        element21.setAttribute("readonly", "yes");
        element21.setAttribute("class", "custom-input-2");
        element21.setAttribute("min", "0");
        cell7.appendChild(element6);
        cell7.appendChild(element21);


        var cell8 = row.insertCell(7);
        var element7 = document.createElement("select");
        var option_array = ["Y"];
        var option = document.createElement("option");
        option.value = "N";
        option.text = "N";
        element7.appendChild(option);
        for (var i = 0; i < option_array.length; i++) {
            option = document.createElement("option");
            option.value = option_array[i];
            option.text = option_array[i];
            element7.appendChild(option);
        }
        element7.name = "quarter2[]";
        element7.setAttribute("onchange", "javascript:quarter_value(this.value," + serial_number + ",2)");
        element7.setAttribute("required", "yes");
        element7.id = "quarter2" + serial_number;
        //New Element in same td
        var element22 = document.createElement("input");
        element22.type = "number";
        element22.name = "quarter2_value[]";
        element22.id = "quarter2_value" + serial_number;
        element22.setAttribute("readonly", "yes");
        element22.setAttribute("class", "custom-input-2");
        element22.setAttribute("min", "0");
        cell8.appendChild(element7);
        cell8.appendChild(element22);


        var cell9 = row.insertCell(8);
        var element8 = document.createElement("select");
        var option_array = ["Y"];
        var option = document.createElement("option");
        option.value = "N";
        option.text = "N";
        element8.appendChild(option);
        for (var i = 0; i < option_array.length; i++) {
            option = document.createElement("option");
            option.value = option_array[i];
            option.text = option_array[i];
            element8.appendChild(option);
        }
        element8.name = "quarter3[]";
        element8.setAttribute("onchange", "javascript:quarter_value(this.value," + serial_number + ",3)");
        element8.setAttribute("required", "yes");
        element8.id = "quarter3" + serial_number;
        //New Element in same td
        var element23 = document.createElement("input");
        element23.type = "number";
        element23.name = "quarter3_value[]";
        element23.id = "quarter3_value" + serial_number;
        element23.setAttribute("readonly", "yes");
        element23.setAttribute("class", "custom-input-2");
        element23.setAttribute("min", "0");
        cell9.appendChild(element8);
        cell9.appendChild(element23);



        var cell10 = row.insertCell(9);
        var element9 = document.createElement("select");
        var option_array = ["Y"];
        var option = document.createElement("option");
        option.value = "N";
        option.text = "N";
        element9.appendChild(option);
        for (var i = 0; i < option_array.length; i++) {
            option = document.createElement("option");
            option.value = option_array[i];
            option.text = option_array[i];
            element9.appendChild(option);
        }
        element9.name = "quarter4[]";
        element9.setAttribute("onchange", "javascript:quarter_value(this.value," + serial_number + ",4)");
        element9.setAttribute("required", "yes");
        element9.id = "quarter4" + serial_number;
        //New Element in same td
        var element24 = document.createElement("input");
        element24.type = "number";
        element24.name = "quarter4_value[]";
        element24.id = "quarter4_value" + serial_number;
        element24.setAttribute("readonly", "yes");
        element24.setAttribute("class", "custom-input-2");
        element24.setAttribute("min", "0");
        cell10.appendChild(element9);
        cell10.appendChild(element24);


        var cell11 = row.insertCell(10);
        var element10 = document.createElement("input");
        element10.type = "text";
        element10.name = "budget[]";
        element10.setAttribute("class", "custom-input");
        cell11.appendChild(element10);


        var cell12 = row.insertCell(11);
        var element11 = document.createElement("select");
        element11.id = "responsibility_list" + serial_number;
        element11.setAttribute("class", "custom-select-1");
        element11.setAttribute("multiple", "multiple");
        <?php
        $responsibility_array = "";
        foreach ($responsibility_list2 as $responsibility2) {
            $responsibility_array .= "'" . str_replace("'", "", $responsibility2['responsibility']) . "',";
        }
        $responsibility_array = substr($responsibility_array, 0, -1);
        ?>
        var option_array = [<?php echo $responsibility_array; ?>];
        var option = document.createElement("option");
        option.value = '';
        option.text = "Select";
        element11.setAttribute("required", "yes");
        element11.appendChild(option);
        for (var i = 0; i < option_array.length; i++) {
            option = document.createElement("option");
            option.text = option_array[i];
            element11.appendChild(option);
        }
        //New Add Button in same td
        var element33 = document.createElement("a");
        element33.setAttribute("href", "javascript:void(0)");
        element33.innerHTML = "Select";
        element33.setAttribute("class", "add-button");
        element33.setAttribute("onclick", "javascript:SetResponsibilities(" + serial_number + ")");
        //Add text area in same td
        var element34 = document.createElement("textarea");
        element34.name = "responsibilities[]";
        element34.id = "responsibilities" + serial_number;
        element34.setAttribute("class", "custom-input");
        cell12.appendChild(element11);
        cell12.appendChild(element33);
        cell12.appendChild(element34);


        var cell13 = row.insertCell(12);
        var element12 = document.createElement("select");
        element12.id = "partner_list" + serial_number;
        element12.setAttribute("class", "custom-select-1");
        element12.setAttribute("multiple", "multiple");
        <?php
        $partner_array = "";
        foreach ($partner_list2 as $partner2) {
            $partner_array .= "'" . str_replace("'", "", $partner2['partner']) . "',";
        }
        $partner_array = substr($partner_array, 0, -1);
        ?>
        var option_array = [<?php echo $partner_array; ?>];
        var option = document.createElement("option");
        option.value = '';
        option.text = "Select";
        element12.setAttribute("required", "yes");
        element12.appendChild(option);
        for (var i = 0; i < option_array.length; i++) {
            option = document.createElement("option");
            option.text = option_array[i];
            element12.appendChild(option);
        }
        //New Add Button in same td
        var element43 = document.createElement("a");
        element43.setAttribute("href", "javascript:void(0)");
        element43.setAttribute("class", "add-button");
        element43.innerHTML = "Select";
        element43.setAttribute("onclick", "javascript:SetPartners(" + serial_number + ")");
        //Add text area in same td
        var element44 = document.createElement("textarea");
        element44.name = "partners[]";
        element44.id = "partners" + serial_number;
        element44.setAttribute("class", "custom-input");
        cell13.appendChild(element12);
        cell13.appendChild(element43);
        cell13.appendChild(element44);


        var cell14 = row.insertCell(13);
        var element13 = document.createElement("input");
        element13.type = "text";
        element13.name = "remarks[]";
        element13.setAttribute("class", "custom-input");
        cell14.appendChild(element13);
    }

    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var delete_row_no = rowCount - 1;

            var data_found = document.getElementById('strategy' + delete_row_no).value;
            if (data_found > 0) {
                if (confirm("Are you sure to delete this row?")) {
                    if (delete_row_no > 1) {
                        table.deleteRow(delete_row_no);
                        rowCount--;
                    }
                }
            } else {
                if (delete_row_no > 1) {
                    table.deleteRow(delete_row_no);
                    rowCount--;
                }
            }
        } catch (e) {
            alert(e);
        }
    }
</script>
<script>
    function quarter_value(val, sl, id) {
        if (val == 'Y') {
            document.getElementById('quarter' + id + '_value' + sl).removeAttribute("readonly");
        } else {
            document.getElementById('quarter' + id + '_value' + sl).value = "";
            document.getElementById('quarter' + id + '_value' + sl).setAttribute("readonly", "yes");
        }
    }
</script>
<div class="main-content">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb light">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data Entry</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Data Entry
                </div>
                <div class="card-body">
                    <form action="" method="post" id="contact_form" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header-custom">General Information</div>
                            <div class="card-body no-padding">
                                <table class="table table-bordered table-responsive" style="width:100%">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState" class="col-form-label">Thematic Area</label>
                                            <select class="form-control" id="thematic_area" name="thematic_area" required>
                                                <option value="">Select</option>
                                                <?php
                                                foreach ($thematic_area_list as $thematic_area) {
                                                ?>
                                                    <option value="<?php echo $thematic_area['id']; ?>" <?php
                                                                                                        if ($thematic_area['id'] == $thematic_area_id) {
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                        ?>><?php echo $thematic_area['name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputState" class="col-form-label">Fiscal Year</label>
                                            <select class="form-control" id="finance_year" name="finance_year" required>
                                                <option value="">Select</option>
                                                <?php
                                                foreach ($fiscal_years as $fiscal_year) {
                                                ?>
                                                    <option value="<?php echo $fiscal_year['fiscal_year']; ?>" <?php
                                                                                                                if ($fiscal_year['fiscal_year'] == $fn_year) {
                                                                                                                    echo "selected";
                                                                                                                }
                                                                                                                ?>><?php
                                                                                                                    echo $fiscal_year['fiscal_year'];
                                                                                                                    ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header-custom">
                                Work Plan
                            </div>
                            <div class="card-body no-padding">
                                <INPUT type="button" value="Add Row" class="btn btn-warning btn-sm" onclick="addRow('dataTable')" />

                                <INPUT type="button" value="Delete Row" class="btn btn-danger btn-sm" onclick="deleteRow('dataTable')" />
                                <span>
                                    <img id="loading-image" src="loading.gif" style="display:none;height:75px;width:75px;" />
                                </span>
                                <div class="table-responsive">
                                    <table class="table table-bordered" style="width:100%" id="dataTable">
                                        <tr style="background-color:#E2F5F0;">
                                            <th width="2%" rowspan="2">Sl</th>
                                            <th width="8%" rowspan="2">Outputs</th>
                                            <th width="8%" rowspan="2">Activities</th>
                                            <th width="8%" rowspan="2">Deliverables</th>
                                            <th width="15%" colspan="2">Value</th>
                                            <th width="15%" colspan="4">Activities(Quarterly)</th>
                                            <th width="8%" rowspan="2">Budget</th>
                                            <th width="8%" rowspan="2">Responsibilities</th>
                                            <th width="8%" rowspan="2">Partners</th>
                                            <th width="8%" rowspan="2">Remarks</th>
                                        </tr>
                                        <tr style="background-color:#E2F5F0;">
                                            <th>Baseline</th>
                                            <th>Target</th>
                                            <th>1st</th>
                                            <th>2nd</th>
                                            <th>3rd</th>
                                            <th>4th</th>
                                        </tr>
                                        <?php
                                        $i = 1;
                                        foreach ($work_plan_details_edit as $work_plan_details) {
                                        ?>
                                            <tr>
                                                <input type="hidden" name="id[]" value="<?php echo $work_plan_details['id']; ?>" />
                                                <td> <?php echo $i; ?> </td>
                                                <td>
                                                    <select name="activity[]" id="activity<?php echo $i; ?>" class="custom-select-2" onchange="javascript:getSubActivity(this.value, <?php echo $i; ?>)" required>
                                                        <option value="<?php echo $work_plan_details['activity_id']; ?>"><?php echo $work_plan_details['activity_name']; ?></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="sub_activity[]" id="sub_activity<?php echo $i; ?>" class="custom-select-2" onchange="javascript:getIndicator(this.value, <?php echo $i; ?>)" required>
                                                        <option value="<?php echo $work_plan_details['sub_activity_id']; ?>"><?php echo $work_plan_details['sub_activity_name']; ?></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="indicator[]" id="indicator<?php echo $i; ?>" class="custom-select-2" required>
                                                        <option value="<?php echo $work_plan_details['indicator_id']; ?>"><?php echo $work_plan_details['indicator_name']; ?></option>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="baseline[]" id="baseline<?php echo $i; ?>" class="custom-input" value="<?php echo $work_plan_details['baseline']; ?>"></td>
                                                <td><input type="text" name="target_value[]" id="target_value<?php echo $i; ?>" class="custom-input" value="<?php echo $work_plan_details['target_value']; ?>"></td>
                                                <td>
                                                    <select name="quarter1[]" id="quarter11" onchange="quarter_value(this.value, <?php echo $i; ?>, 1)">
                                                        <option value="N" <?php echo ($work_plan_details['quarter1'] == 'N') ? 'selected' : ''; ?>>N</option>
                                                        <option value="Y" <?php echo ($work_plan_details['quarter1'] == 'Y') ? 'selected' : ''; ?>>Y</option>
                                                    </select>
                                                    <input type="text" name="quarter1_value[]" id="quarter1_value<?php echo $i; ?>" class="custom-input-2" value="<?php echo $work_plan_details['quarter1_value']; ?>" readonly>
                                                </td>
                                                <td>
                                                    <select name="quarter2[]" id="quarter21" onchange="quarter_value(this.value, <?php echo $i; ?>, 2)">
                                                        <option value="N" <?php echo ($work_plan_details['quarter2'] == 'N') ? 'selected' : ''; ?>>N</option>
                                                        <option value="Y" <?php echo ($work_plan_details['quarter2'] == 'Y') ? 'selected' : ''; ?>>Y</option>
                                                    </select>
                                                    <input type="text" name="quarter2_value[]" id="quarter2_value<?php echo $i; ?>" class="custom-input-2" value="<?php echo $work_plan_details['quarter2_value']; ?>" readonly>
                                                </td>
                                                <td>
                                                    <select name="quarter3[]" id="quarter31" onchange="quarter_value(this.value, <?php echo $i; ?>, 3)">
                                                        <option value="N" <?php echo ($work_plan_details['quarter3'] == 'N') ? 'selected' : ''; ?>>N</option>
                                                        <option value="Y" <?php echo ($work_plan_details['quarter3'] == 'Y') ? 'selected' : ''; ?>>Y</option>
                                                    </select>
                                                    <input type="text" name="quarter3_value[]" id="quarter3_value<?php echo $i; ?>" class="custom-input-2" value="<?php echo $work_plan_details['quarter3_value']; ?>" readonly>
                                                </td>
                                                <td>
                                                    <select name="quarter4[]" id="quarter41" onchange="quarter_value(this.value, <?php echo $i; ?>, 4)">
                                                        <option value="N" <?php echo ($work_plan_details['quarter4'] == 'N') ? 'selected' : ''; ?>>N</option>
                                                        <option value="Y" <?php echo ($work_plan_details['quarter4'] == 'Y') ? 'selected' : ''; ?>>Y</option>
                                                    </select>
                                                    <input type="text" name="quarter4_value[]" id="quarter4_value<?php echo $i; ?>" class="custom-input-2" value="<?php echo $work_plan_details['quarter4_value']; ?>" readonly>
                                                </td>
                                                <td><input type="text" name="budget[]" id="budget<?php echo $i; ?>" class="custom-input" value="<?php echo $work_plan_details['budget']; ?>"></td>
                                                <td>
                                                    <select id="responsibility_list<?php echo $i; ?>" class="custom-input" multiple="multiple">
                                                        <option value="">Select</option>
                                                        <?php
                                                        foreach ($responsibility_list as $responsibility) {
                                                        ?>
                                                            <option value="<?php echo $responsibility['responsibility']; ?>"><?php echo $responsibility['responsibility']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <a href="javascript:void(0)" class="add-button" onclick="SetResponsibilities(<?php echo $i; ?>)">Select</a>
                                                    <textarea id="responsibilities<?php echo $i; ?>" name="responsibilities[]" class="custom-input" readonly="readonly"><?php echo $work_plan_details['responsibilities']; ?></textarea>
                                                </td>
                                                <td>
                                                    <select id="partner_list<?php echo $i; ?>" class="custom-input" multiple="multiple">
                                                        <option value="">Select</option>
                                                        <?php
                                                        foreach ($partner_list as $partner) {
                                                        ?>
                                                            <option value="<?php echo $partner['partner']; ?>"><?php echo $partner['partner']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <a href="javascript:void(0)" class="add-button" onclick="SetPartners(<?php echo $i; ?>)">Select</a>
                                                    <textarea id="partners<?php echo $i; ?>" name="partners[]" class="custom-input" readonly="readonly"><?php echo $work_plan_details['partners']; ?></textarea>
                                                </td>
                                                <td><input type="text" name="remarks[]" class="custom-input" value="<?php echo $work_plan_details['remarks']; ?>"></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row gutters">
                            <div class="col-sm-10">
                                <button type="submit" name="save" value="Save" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function SetResponsibilities(id_val) {
        var responsibilities = document.getElementById("responsibilities" + id_val);
        var selected = document.querySelectorAll("#responsibility_list" + id_val + " option:checked");
        if (selected.length > 0) {
            var newStr = responsibilities.value.concat(', ', (Array.prototype.map.call(selected, el => el.value).join(', ')));
            if (newStr.charAt(0) == ',') {
                responsibilities.value = newStr.substr(2, newStr.length);
            } else {
                responsibilities.value = newStr;
            }
        } else {
            alert('Please select option and click on the button');
        }
    }

    function SetPartners(id_val) {
        var partners = document.getElementById("partners" + id_val);
        var selected = document.querySelectorAll("#partner_list" + id_val + " option:checked");
        if (selected.length > 0) {
            var newStr = partners.value.concat(', ', (Array.prototype.map.call(selected, el => el.value).join(', ')));
            if (newStr.charAt(0) == ',') {
                partners.value = newStr.substr(2, newStr.length);
            } else {
                partners.value = newStr;
            }

        } else {
            alert('Please select option and click on the button');
        }
    }
</script>