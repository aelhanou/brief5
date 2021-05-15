<?php require_once APPROOT . '/views/inc/header.php' ?>



<div class="jumbotron">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">

            <form action="" method="post">
                <h1 class="texet-center">Mr Azeddine</h1>
                <div class="form-group">
                    <label for="name">Groups: <sup>*</sup></label>
                    <select class="form-control form-control-lx">
                        <option selected>Choose Group</option>
                        <?php foreach ($this->getGroups() as $groupe) : ?>

                            <option> <?php echo $groupe->groupe ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Salles: <sup>*</sup></label>
                    <select class="form-control form-control-lx">
                        <option selected>Choose Salle</option>
                        <?php foreach ($this->getSalles() as $salle) : ?>

                            <option> <?php echo $salle->salle ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Jours: <sup>*</sup></label>
                    <input type="date" class="form-control" name="jour" id="">
                </div>
                <div class="form-group">
                    <label for="name">temps: <sup>*</sup></label>
                    <select class="form-control form-control-lx">
                        <option selected>temps</option>
                        <option value="1">08:00-10:00</option>
                        <option value="2">10:00-12:00</option>
                        <option value="3">12:00-14:00</option>
                        <option value="3">14:00-16:00</option>
                        <option value="3">16:00-18:00</option>
                    </select>
                </div>
                <div class="col  align-self-end">
                    <input class="btn btn-primary" type="submit" value="reserve" name="reserve">
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once APPROOT . '/views/inc/footer.php' ?>