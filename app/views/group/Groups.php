<?php require_once APPROOT . '/views/inc/header.php' ?>

<div class="text-center  m-3 fs-1 ">Group</div>
<form action="http://localhost/brief5/Groups/Insert" method="post">
  <div class="col-md-6 mb-5 mt-5 mx-auto ">
    <div class="card card-body bg-light mt-6">
      <div class="input-group mb-3 ">
        <input type="text" name="groupName" class="form-control" placeholder="Nom de Group" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <input type="text" name="effectif" class="form-control" placeholder="Effectif" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="w-100 text-right ">
        <input type="submit" name="submit" class="w-25" value="Submit">
      </div>
    </div>
</form>
</div>


<div class="col-md-7 m-auto text-center">
  <div class="card card-body bg-light ">
    <form id="editForm" action="" method="post"></form>
    
      <table class="table">
        <tr>
          <th class="text-center">Group Name</th>
          <th class="text-center">Effectif</th>
          <th class="text-center">Action</th>
        </tr>


        <?php foreach ($data as $key => $dat) : ?>
          <tr>
            <td>
              <input type="text" class="input1 border-0" value="<?php echo $dat->groupe ?>" name="gr_name"  >
            </td>
            <td>
              <input type="text"class="input1 border-0"  value="<?php echo $dat->effectif ?>" name="effectif_numb" >
            </td>
            <td>
              <a href="http://localhost/brief5/Groups/Save/<?= $dat->id ?>" id="Edit" class="btn btn-success btn-sm" onclick="edit(event)" name='Edit' value="<?php echo  $dat->id ?>">Edit</a>
              <button id="Save" class="btn btn-success btn-sm" name='Save' value="<?php echo  $dat->id ?>">Save</button>

              <a href="http://localhost/brief5/Groups/delete/<?= $dat->id ?>" class="btn btn-danger btn-sm" onclick="Delete(event)" name='Delete' value="<?php echo $dat->id ?>">Delete</a>
              <button id="cancel" class="btn btn-danger btn-sm" onclick="Delete(event)" name='Cancel' value="<?php echo $dat->id ?>">Cancel</button>
            </td>
          </tr>

        <?php endforeach ?>
    </tr>

    </table>
  </div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php' ?>