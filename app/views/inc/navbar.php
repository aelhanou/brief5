<nav class="navbar navbar-expand-lg navbar-dark  mb-3" style="background-color: #536DFE;">
  <div class="container-fluid">
      <a class="navbar-brand text-white" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>"><i class="fas fa-home"></i>&nbsp;Home</a>
          </li>
          <?php if(isset($_SESSION['role'])): ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/Enseignents/Enseignent"><i class="fas fa-user"></i>&nbsp;Enseignent</a>
          </li>
          <?php endif;?>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/salles/salle">Salles</a>
          </li>
          <?php endif;?>

          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/Groups/group"><i class="fas fa-users"></i>&nbsp;Groups</a>
          </li>
          <?php endif;?>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/Matieres/matiere">Matiere</a>
          </li>
          <?php endif;?>
        </ul>
        <ul class="navbar-nav ml-auto">
        <?php if(!isset($_SESSION['role'])):?>
        
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/register"><i class="fas fa-user-plus"></i>&nbsp;Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/login"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a>
          </li>
          <?php endif;?>
          <?php if(isset($_SESSION['role'])):?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/logout"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
          </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>