<?php
@include '../../include/connection.php';

$start= (isset($_POST['select_sdate']))?$_POST['select_sdate']:'';
$end= (isset($_POST['select_edate']))?$_POST['select_edate']:'';
$Market_Authorisation_Holder = (isset($_POST['select_market']))?$_POST['select_market']:'';
$Country_Market_holder = (isset($_POST['select_country']))?$_POST['select_country']:'';

?>
<?php if(!empty($start)) : ?>
<?php
    if(!empty($end)){
        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '$end'");
        if(!empty($Market_Authorisation_Holder)){
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '$end' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder'");
            if(!empty($Country_Market_holder )){
                $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '$end' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Country_of_Manufacturer = '$Country_Market_holder'");
            }
        }
        if(!empty($Country_Market_holder)){
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '$end' AND Country_of_Manufacturer = '$Country_Market_holder'");
            if(!empty($Market_Authorisation_Holder)){
                $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '$end' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Country_of_Manufacturer = '$Country_Market_holder'");
            }
        }
    }
    else{
        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '2032-12-31'");
        if(!empty($Market_Authorisation_Holder)){
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '2032-12-31' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder'");
            if(!empty($Country_Market_holder )){
                $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '2032-12-31' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Country_of_Manufacturer = '$Country_Market_holder'");
            }
        }
        if(!empty($Country_Market_holder)){
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '2032-12-31' AND Country_of_Manufacturer = '$Country_Market_holder'");
            if(!empty($Market_Authorisation_Holder)){
                $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '2032-12-31' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Country_of_Manufacturer = '$Country_Market_holder'");
            }
        }
    }
    ?>
    <?php
        $reset = false;
        $i=1;
        while ($row = mysqli_fetch_array($result)){
        ?>

    <tr>
        <th scope="row"><?php echo $i; ?></th>
        <td><?php echo $row["Certificate_Number"]; ?></td>
        <td><?php echo $row["Generic_Name"]; ?></td>
        <td><?php echo $row["Brand_Name"]; ?></td>
        <td><?php echo $row["Therapeutic_Category"]; ?></td>
        <td><?php echo $row["Manufacturer"]; ?></td>
        <td><?php echo $row["Market_Authorisation_Holder"]; ?></td>
        <td><?php echo $row["Expiry_Date"]; ?></td>
    </tr>
    <script>
        $("#paginate").attr("hidden",true);
    </script>

    <?php
        $i++;
    };
    ?>

<?php elseif(!empty($Market_Authorisation_Holder)) : ?>
<?php
    $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' ");
    if(!empty($start)){
        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Expiry_Date >'$start' AND Expiry_Date < '2032-12-31'");
        if(!empty($end)){
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Expiry_Date >'$start' AND Expiry_Date < '$end'");
            if(!empty($Country_Market_holder)){
                    $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Expiry_Date >'$start' AND Expiry_Date < '$end' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Country_of_Manufacturer = '$Country_Market_holder'");
                }
        }         
    }
    elseif (!empty($Country_Market_holder)) {
        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Country_of_Manufacturer = '$Country_Market_holder'");
        if(!empty($start)){
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Expiry_Date >'$start' AND Expiry_Date < '2032-12-31'");
            if(!empty($end)){
                $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Expiry_Date >'$start' AND Expiry_Date < '$end'");
            }
        }
    }
        $reset = false;
        $i=1;
        while ($row = mysqli_fetch_array($result)){
        ?>

<tr>
    <th scope="row"><?php echo $i; ?></th>
    <td><?php echo $row["Certificate_Number"]; ?></td>
    <td><?php echo $row["Generic_Name"]; ?></td>
    <td><?php echo $row["Brand_Name"]; ?></td>
    <td><?php echo $row["Therapeutic_Category"]; ?></td>
    <td><?php echo $row["Manufacturer"]; ?></td>
    <td><?php echo $row["Market_Authorisation_Holder"]; ?></td>
    <td><?php echo $row["Expiry_Date"]; ?></td>
</tr>
<script>
    $("#paginate").attr("hidden",true);
</script>

<?php
        $i++;
    };
    ?>
<?php elseif(!empty($Country_Market_holder)) : ?>
<?php
        $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Country_of_Manufacturer = '$Country_Market_holder' ");
        if (!empty($Market_Authorisation_Holder)) {
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Country_of_Manufacturer = '$Country_Market_holder' AND Market_Authorisation_Holder = '$Market_Authorisation_Holder' ");
            if (!empty($start)) {
                $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Expiry_Date >'$start' AND Expiry_Date < '2032-12-31'");
                if (!empty($end)) {
                    $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Expiry_Date >'$start' AND Expiry_Date < '$end'");
                }
            }
        }
        elseif (!empty($start)) {
            $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Country_of_Manufacturer = '$Country_Market_holder' AND Expiry_Date >'$start' AND Expiry_Date < '2032-12-31' ");
            if (!empty($end)) {
                $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Country_of_Manufacturer = '$Country_Market_holder' AND Expiry_Date >'$start' AND Expiry_Date < '$end' ");
                if (!empty($Market_Authorisation_Holder)) {
                    $result = mysqli_query($conn,"SELECT * FROM `drug_record` WHERE Market_Authorisation_Holder = '$Market_Authorisation_Holder' AND Expiry_Date >'$start' AND Expiry_Date < '$end'");
                }
            }
        }
        $reset = false;
        $i=1;
        while ($row = mysqli_fetch_array($result)){
        ?>

<tr>
    <th scope="row"><?php echo $i; ?></th>
    <td><?php echo $row["Certificate_Number"]; ?></td>
    <td><?php echo $row["Generic_Name"]; ?></td>
    <td><?php echo $row["Brand_Name"]; ?></td>
    <td><?php echo $row["Therapeutic_Category"]; ?></td>
    <td><?php echo $row["Manufacturer"]; ?></td>
    <td><?php echo $row["Market_Authorisation_Holder"]; ?></td>
    <td><?php echo $row["Expiry_Date"]; ?></td>
</tr>
<script>
    $("#paginate").attr("hidden",true);
</script>

<?php
        $i++;
    };
    ?>
<?php elseif(empty($Country_Market_holder) && empty($Market_Authorisation_Holder) && empty($start) || empty($end)) : ?>
    <?php 
        // variable to store number of rows per page
        $total_records_per_page = 15;   

        // update the active page number
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";
        
        $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `drug_record`");
        $total_records = mysqli_fetch_array($result_count);
        $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1; // total pages minus 1
        $result = mysqli_query($conn,"SELECT * FROM `drug_record` LIMIT $offset, $total_records_per_page");
    ?>
    <?php
    $reset = true;
    $i=1;
        while ($row = mysqli_fetch_array($result)){
        ?>

<tr>
    <th scope="row"><?php echo $i; ?></th>
    <td><?php echo $row["Certificate_Number"]; ?></td>
    <td><?php echo $row["Generic_Name"]; ?></td>
    <td><?php echo $row["Brand_Name"]; ?></td>
    <td><?php echo $row["Therapeutic_Category"]; ?></td>
    <td><?php echo $row["Manufacturer"]; ?></td>
    <td><?php echo $row["Market_Authorisation_Holder"]; ?></td>
    <td><?php echo $row["Expiry_Date"]; ?></td>
</tr>
<script>
    $("#paginate").attr("hidden",false);
</script>

<?php
        $i++;
    };
    ?>
<?php endif; ?>

<script>
    $(document).ready(function () {
        $("#search_name").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#MyTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    
</script>