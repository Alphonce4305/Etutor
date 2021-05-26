<?php
session_start();
include_once 'header.php'; 
include_once 'dbconfig.php';

// GRAB INDIVIDUAL USER ID SENT


if (isset($_GET['user'])) {
  $user_id = $_GET['user'];
  $item = $_GET['item'];
  $sql = "SELECT fname ,lname,sex FROM users WHERE user_id = $user_id  LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $found_name = mysqli_fetch_array($result , MYSQLI_ASSOC);
  foreach ($result as  $value) {
    $username = $value['fname']." ".$value['lname'];
    $sex = $value['sex'];
  }
  if ($sex == 'M') {
    $user_title = "Mr.";
  }elseif ($sex == 'F') {
    $user_title = "Madam.";
  }elseif ($sex == "O") {
    $user_title = " ";
  }
  $profile = $username;
}
//GET USERNAME AND PROFILE INFORMATION

//DEFAULT CUURENT USER PROFILE
?>
         <!--/span-->
         <br>
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="" style="max-height: 550px; overflow-y: scroll;">
                  <h4 align="left"> <?php echo  $user_title. " ".$profile ;?></h4>
                  
                            
                          <div >
                            <hr>

                            <?php
                            $sql = "SELECT * FROM `teacher_profile` WHERE u_id = '$user_id'";
                            $query = mysqli_query($conn,$sql);
                            $count = Mysqli_num_rows($query);
                            if ($count > 0) {
                            if ($query == true) {

                              while ($row = mysqli_fetch_array($query , MYSQLI_ASSOC)) {?>
                           
                                  <!-- OTHER DETAILS -->
                                  <p>Title:<b><?php echo strtoupper($row['title']);?>.</b></p>
                    <h3><i class="glyphicon glyphicon-chevron-right"></i>Education Background</h3>
                        <p>Tertiary:<?php echo ucwords($row['post_sch']);?></p>
                        <p>High School:<?php echo  ucwords($row['sec_sch']);?></p>
                        <p>Primary:<?php echo ucwords($row['pri_sch']);?></p>
                      <hr>
                    <h3><i class="glyphicon glyphicon-chevron-right"></i>Employement Background</h3>
                        <p>Occupation:<?php echo ucwords($row['current_work']);?></p>
                        <p>Work Experience:<?php echo  ucwords($row['work_exp']);?> Years</p>
                      <hr>
                    <h3><i class="glyphicon glyphicon-chevron-right"></i>Residential Background</h3>
                       	<p>County:<?php echo ucwords($row['county']);?></p>
                        <p>Sub-County:<?php echo ucwords($row['sub_county']);?></p>
                        <p>Street Address:<?php echo ucwords($row['street']);?></p>
                        <p>House No:<?php echo ucwords($row['house_no']);?></p>
                    <h3><i class="glyphicon glyphicon-chevron-right"></i>Other Informatiom</h3>
                        <textarea style="max-width: 50%; min-width: 50%; max-height: 100px; min-height: 100px; border-radius: 4px;color: green;font-weight: bold;text-align: left;" readonly=""><?php echo ucwords($row['other_desc']); ?></textarea>
                    <h3><i class="glyphicon glyphicon-chevron-right"></i>Contacts</h3>
                    		<p>Email Address:<?php echo ucwords($row['email']);?></p>
                    		<p>Mobile Number:<?php echo ucwords($row['phones']);?></p>

                    		<!-- Redirect to booking page -->

                    		   <a  class="btn btn-info btn-xs" href="booking.php?user_id=<?php echo $user_id;?>&item=<?php echo $item;  ?>"><i>Click to hire...</i></a>|<a  class="btn btn-danger btn-xs" href="parent.php"><i>Return home....</i></a>
                               <?php
                              }
                       }
            }else{
            	echo "<h5><b>Oops ! </b>No records found</h5>";
            }
     ?>
                          
                        
                      </div>
                     
                    </div>  
            </div>
        </div>

        <!--/span-->


