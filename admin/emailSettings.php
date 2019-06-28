<?php
session_start();

if (!isset($_SESSION['u_id'])) {
    header("location:login.php");
    exit();
}
/**
 * Created by PhpStorm.
 * User: Sumit
 * Date: 8/16/2017
 * Time: 9:42 PM
 */
$currentPage = 'editMailingList';



require_once "../DBConn/DBConnection.php";
include "adminHeader.php";

if(isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<script> Lobibox.alert("success",{
                    msg:"New Email Added."
                }); </script>';
    }
    if ($_GET['status'] == 'failed') {
        echo '<script> Lobibox.alert("error",{
                    msg:"Sorry, Please try again."
                }); </script>';
    }

}
?>

    <!--Mailing display and delete -->

    <div class="container">
        <h2 class="text-capitalize text-center text-success"> Edit Mailing List </h2>
        <br>

        <?php
        $output = '';
        $query = " SELECT * FROM mailinglist ORDER BY mail_type ASC";
        $result = mysqli_query($conn, $query);
        $sn = 1;
        $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th>S.N.</th>  
                     <th>Email Adress</th> 
                     <th>Type</th> 
                     <th>Action</th>  
                </tr>  
      ';
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $type = null;
                if($row['mail_type'] ==0)
                {
                    $type ="CC";
                }

                elseif($row['mail_type']==1)
                {
                    $type= "BCC";
                }
                $output .= '  
                     <tr>  
                          <td>'. $sn .'</td>  
                          <td>'. $row["mail_name"] .'</td>  
                           <td>'. $type .'</td>
                          
                          <td> <a class="btn btn-danger" href="mailDelete.php?id='. $row['mail_id'].'" onclick="return confirm(\'Are you sure?\')" >  <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Delete </a></td>
                            
                     </tr>  
                ';
                $sn++;
            }
        }
        else
        {
            $output .= '  
                <tr>  
                     <td colspan="8" class="text-center">No Course has been Inserted!!</td>  
                </tr>  
           ';
        }
        $output .= '</table>';
        echo $output;
        ?>
    </div>

    <!--Mailing Add -->

    <div class="container">
        <h2 class="text-capitalize text-center text-success"> Upload Mailing Address </h2>
        <br>
        <form id="emailForm" action="mailSubmit.php" enctype="multipart/form-data" method="POST" role="form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email" class="col-form-label">Email Address</label>
                    <input type="text" class="form-control required" id="email" name="email" placeholder="Email Address" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="type" class="col-form-label">Type</label>
                    <select class="form-control required" id="type" name="type" >
                        <option selected="selected" disabled>Select</option>
                        <option value=0>CC</option>
                        <option value=1>BCC</option>

                    </select>
                </div>





                <button type="submit" name="submit" class="btn btn-primary pull-left">Submit </button>
                <br><br>
            </div>
        </form>
    </div>
    <br>
    <br>

<?php include "adminFooter.php" ?>