    

    <?php

session_start();
include 'dbconfig.php';
include_once 'header.php';
    ?>
<!--Add subject modal-->
<div class="well">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">ADD SUBJECTS TO TEACH</h4>
      </div>
      <div class="modal-body">

 <form class="form-horizontal" role="form" action="settings.php?action=addsubject" method="post">
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 1</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item1">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>

      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 2</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item2">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
    
      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 3</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item3">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 4</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item4">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 5</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item5">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 6</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item6">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 7</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item7">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 8</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item8">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      </div>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 9</label>
      <div class="col-sm-10">
    <select class="form-control sm" name="item9">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="addsubject">ADD</button>
    </div>
  </div>
</form>          
          
      </div>
    </div>

  </div>
</div>
