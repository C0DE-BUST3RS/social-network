<aside class="menu">
	<p class="menu-label">
		General
	</p>
	<ul class="menu-list">
		<li><a href="index.php" <?php if ($_SERVER['PHP_SELF'] == "/admin/index.php") { ?> class="is-active" <?php } ?>">Dashboard</a></li>
		<li><a href="users-overview.php" <?php if ($_SERVER['PHP_SELF'] == "/admin/users-overview.php") { ?> class="is-active" <?php } ?>>Users</a></li>
	</ul>
	<p class="menu-label">
		API
	</p>
	<ul class="menu-list">
        <li><a href="api/calls.php" <?php if ($_SERVER['PHP_SELF'] == "/admin/key-requests.php") { ?> class="is-active" <?php } ?>>API Calls</a></li>
        <li><a href="api/key-requests.php" <?php if ($_SERVER['PHP_SELF'] == "/admin/key-requests.php") { ?> class="is-active" <?php } ?>>Key Requests</a></li>
        <li><a href="api/keys.php" <?php if ($_SERVER['PHP_SELF'] == "/admin/key-requests.php") { ?> class="is-active" <?php } ?>>API Keys</a></li>
    </ul>
	<p class="menu-label">
		Support
	</p>
	<ul class="menu-list">
		<li><a href="contact-messages.php" <?php if ($_SERVER['PHP_SELF'] == "/admin/contact-messages.php") { ?> class="is-active" <?php } ?>>Tickets</a></li>
	</ul>
</aside>