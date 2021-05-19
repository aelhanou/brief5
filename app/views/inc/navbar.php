<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
          </li>
          <?php if(isset($_SESSION['role'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Enseignents/Enseignent">enseignent</a>
          </li>
          <?php endif;?>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/salles/salle">Salles</a>
          </li>
          <?php endif;?>

          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Groups/group">Group</a>
          </li>
          <?php endif;?>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/Matieres/matiere">Matiere</a>
          </li>
          <?php endif;?>
        </ul>
        <ul class="navbar-nav ml-auto">
        <?php if(!isset($_SESSION['role'])):?>
        
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
          <?php endif;?>
          <?php if(isset($_SESSION['role'])):?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
          </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>