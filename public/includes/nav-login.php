<div class="hero-head">
    <nav class="navbar is-fixed-top" style="background: #ffffff">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="feed.php">
                    <img src="/../img/logos/oryx-trans.png" alt="Logo">
                </a>
				<span class="navbar-burger burger" data-target="navMenu">
					<span></span>
					<span></span>
					<span></span>
				</span>
            </div>
			<div id="navMenu" class="navbar-menu">
				<div class="navbar-end">
                    <a href="/../feed.php" class="navbar-item"><i class="fas fa-home"></i>&nbsp;Feed</a>
                    <a href="/../profile.php" class="navbar-item"><i class="fas fa-user"></i>&nbsp;Profile</a>
                    <a href="/../privacy.php" class="navbar-item"><i class="fas fa-user-secret"></i>&nbsp;Privacy</a>
					<a href="/../api.php" class="navbar-item"><i class="fas fa-cogs"></i>&nbsp;API</a>
					<a href="/../contact.php" class="navbar-item"><i class="fas fa-envelope"></i>&nbsp;Contact</a>
                    <a href="/../settings.php" class="navbar-item"><i class="fas fa-sliders-h"></i>&nbsp;Settings</a>
					<?php if($_SESSION['user']['admin'] === 1) { ?>
						<a href="/admin/" class="navbar-item"><i class="fas fa-users"></i>&nbsp;Dashboard</a>
					<?php } ?>
					<a href="/../includes/logout.inc.php" class="navbar-item"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                </div>
			</div>
        </div>
    </nav>
</div>