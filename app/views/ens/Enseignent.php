<?php require_once APPROOT . '/views/inc/header.php' ?>


<div class="container-fluid p-2  " style="background-color:#d9def39e;height:100%;border-radius:10px">
<h1 class="text-center  mt-0">Enseignent</h1>
<div class="jumbotron" style="background-color:#d9def39e;">
    <div class="col-md-6 mx-auto">
        <div class="card card-body mt-0 p-4">

            <form action="http://localhost/brief5/Enseignents/insert" method="post">
                <h1 class="texet-center"><u>Mr <?php echo $this->UserName()->name;?></u></h1>
                <div class="form-group">
                    <label for="name">Groups: <sup>*</sup></label>
                    <select name="id_groupe" class="form-control form-control-lx">
                        <option selected>Choose Group</option>
                        <?php foreach ($this->getGroups() as $groupe) : ?>

                            <option value="<?php echo $groupe->id;?>" > <?php echo $groupe->groupe ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Salles: <sup>*</sup></label>
                    <select name="id_salle" class="form-control form-control-lx">
                        <option selected>Choose Salle</option>
                        <?php foreach ($this->getSalles() as $salle) : ?>

                            <option value="<?php echo $salle->id;?>"> <?php echo $salle->salle ?></option>
                        <?php endforeach; ?>
                    </select>

                    
                </div>
                <div class="form-group">
                    <label for="name">Jours: <sup>*</sup></label>
                    <input type="date" class="form-control" name="jour" id="">
                </div>
                <div class="form-group">
                    <label for="name">temps: <sup>*</sup></label>
                    <select name="heure" class="form-control form-control-lx">
                        <option selected>temps</option>
                        <option value="08:00:00">08:00-10:00</option>
                        <option value="10:00:00">10:00-12:00</option>
                        <option value="12:00:00">12:00-14:00</option>
                        <option value="14:00:00">14:00-16:00</option>
                        <option value="16:00:00">16:00-18:00</option>
                    </select>
                    <?php if(isset($_SESSION['heure']) && $_SESSION['heure'] == 1){ ?>
                        <?php  echo "<label class='text-danger'>this time is already taken</label>"; $_SESSION['heure'] = 0; ?>
                <?php };?>
                
            
        
                </div>
                <div class="col  align-self-end">
                    <input class=" w-25 btn btn-success btn-block float-right" type="submit" value="reserve" name="reserve" style="background-color: #536DFE;">
                </div>
            </form>
        </div>
    </div>
</div>



<div class=" m-auto text-center">
  <div class="card card-body bg-light ">
    <form id="editForm" action="" method="post"></form>
    
      <table class="table">
        <tr>
          <th class="text-center">id</th>
          <th class="text-center">groupe</th>
          <th class="text-center">salle</th>
          <th class="text-center">matiere</th>
          <th class="text-center">date</th>
          <th class="text-center">heure</th>
          <th class="text-center">Action</th>
        </tr>
        
      <?php  foreach($this->getSuivi() as $MyReservation):  ?>
     <?php if($this->getId_matiere()->id_matiere == $MyReservation->id_matiere ) : ?>
        
          <tr>
            <td>
              <input type="text" class="input1 text-center border-0" value="<?php echo $MyReservation->id ?>" name="ens_id_name"  >
            </td>
            <td>
              <input type="text" class="input1 text-center border-0" value="<?php echo $MyReservation->groupe?>" name="ens_groupe_name"  >
            </td>
            <td>
              <input type="text" class="input1 text-center border-0" value="<?php echo $MyReservation->salle  ?>" name="ens_salle_name"  >
            </td>
            <td>
              <input type="text" class="input1 text-center border-0" value="<?php echo $MyReservation->matiere ?>" name="ens_matiere_name"  >
            </td>
            <td>
              <input type="text" class="input1 text-center border-0" value="<?php echo $MyReservation->date  ?>" name="en_date_name"  >
            </td>
            <td>
              <input type="text" class="input1 text-center border-0" value="<?php echo $MyReservation->heure  ?>" name="ens_heure_name"  >
            </td>
            <td>
              <a href="http://localhost/brief5/EditReservationCont/EditReservation/<?= $MyReservation->id ?>" id="Edit" class="btn btn-success btn-sm" style="background-color: #536DFE;"  name='Edit' value="<?php echo  $MyReservation->id ?>">Edit</a>
              <button id="Save" class="btn btn-success btn-sm" name='Save' style="background-color: #536DFE;" value="<?php echo  $MyReservation->id ?>">Save</button>

              <a href="http://localhost/brief5/Enseignents/Delete/<?= $MyReservation->id ?>" class="btn btn-danger btn-sm" onclick="Delete(event)" name='Delete' value="<?php echo $MyReservation->id ?>">Delete</a>
              <button id="cancel" class="btn btn-danger btn-sm" onclick="Delete(event)" name='Cancel' value="<?php echo $MyReservation->id ?>">Cancel</button>
            </td>
          </tr>

        
          
    </tr>
    <?php endif;?>
          <?php endforeach; ?>

    </table>


  </div>
</div>

</div>
<?php require_once APPROOT . '/views/inc/footer.php' ?>