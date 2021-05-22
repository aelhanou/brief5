<?php require_once APPROOT . '/views/inc/header.php' ?>

<?php if (!empty($_GET['url'])) {
    $d = explode('/', $_GET['url']); ?>
    <?php if (isset($d[2])) {
        $_SESSION['id_edit'] = $d[2];
        $this->getOldReservationValues($d[2])->groupe ?>
    <?php } else { ?>
        <?php $d[2] = -1; ?>
    <?php } ?>
<?php } ?>

<div class="container-fluid p-2  " style="background-color:#d9def39e;height:100%;border-radius:10px">
    <h1 class="text-center  mt-0">Edit Reservation</h1>
    <div class="jumbotron" style="background-color:#d9def39e;">
        <div class="col-md-6 mx-auto">
            <div class="card card-body mt-0 p-4">

                <form action="http://localhost/brief5/EditReservationCont/update" method="post">
                    <h1 class="texet-center"><u>Mr</u></h1>
                    <div class="form-group">
                        <label for="name">Groups: <sup>*</sup></label>
                        <select name="id_groupe" class="form-control form-control-lx">
                            <option selected>Choose Group</option>
                            <?php foreach ($this->getGroups() as $groupe) : ?>
                                <?php if ($d[2] > -1) { ?>

                                    <?php if ($this->getOldReservationValues($d[2])->groupe == $groupe->groupe) { ?>
                                        <option value="<?php echo $groupe->id; ?>" selected> <?php echo $groupe->groupe ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $groupe->id; ?>"> <?php echo $groupe->groupe ?></option>
                                    <?php } ?>
                                <?php } else { ?>
                                    <option value="<?php echo $groupe->id; ?>"> <?php echo $groupe->groupe ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Salles: <sup>*</sup></label>
                        <select name="id_salle" class="form-control form-control-lx">
                            <option selected>Choose Salle</option>
                            <?php foreach ($this->getSalles() as $salle) : ?>
                                <?php if ($d[2] > -1) { ?>

                                    <?php if ($this->getOldReservationValues1($d[2])->salle == $salle->salle) { ?>
                                        <option value="<?php echo $salle->id; ?>" selected> <?php echo $salle->salle ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $salle->id; ?>"> <?php echo $salle->salle ?></option>
                                    <?php } ?>
                                <?php } else { ?>
                                    <option value="<?php echo $salle->id; ?>"> <?php echo $salle->salle ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>


                    </div>
                    <div class="form-group">
                        <label for="name">Jours: <sup>*</sup></label>
                        <?php if ($d[2] > -1) { ?>
                            <input type="date" class="form-control" value="<?php echo $this->getOldReservationValues2($d[2])->date ?>" name="jour" id="">
                        <?php } else { ?>
                            <input type="date" class="form-control" name="jour" id="">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="name">temps: <sup>*</sup></label>
                        <select name="heure" class="form-control form-control-lx">
                            <?php if ($d[2] > -1) { ?>
                                <option selected value="<?php echo $this->getOldReservationValues2($d[2])->heure ?>">temps</option>
                            <?php } else { ?>
                                <option selected value="">temps</option>
                            <?php } ?>
                            <option value="08:00:00">08:00-10:00</option>
                            <option value="10:00:00">10:00-12:00</option>
                            <option value="12:00:00">12:00-14:00</option>
                            <option value="14:00:00">14:00-16:00</option>
                            <option value="16:00:00">16:00-18:00</option>
                        </select>
                        <?php if (isset($_SESSION['heure']) && $_SESSION['heure'] == 1) { ?>
                            <?php echo "<label >this time is already taken</label>";
                            $_SESSION['heure'] = 0; ?>
                        <?php }; ?>



                    </div>
                    <div class="col  align-self-end">
                        <a href="http://localhost/brief5/EditReservationCont/cancel" class=" w-25 btn btn-danger btn-block float-right m-3" type="submit" value="Cancel" name="Cancel">Cancel</a>
                    </div>
                    <div class="col  align-self-end">
                    <?php if ($d[2] > -1) { ?>
                        <input class=" w-25 btn btn-success btn-block float-right m-3" type="submit" value="Save" name="Save" style="background-color: #536DFE;">
                        <?php } else { ?>
                        <input class=" w-25 btn btn-success btn-block float-right m-3" type="submit" value="Save" name="Save" style="background-color: #536DFE;"  disabled>
                        <?php }; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <?php require_once APPROOT . '/views/inc/footer.php' ?>