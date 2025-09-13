<!-- header.php -->
<header class="container" id="myHeader">
    <div class="logo">
        <img src="logo.png" alt="logo">
    </div>
    <nav class="nav">
        <a href="events.php" id="lnk1">Events</a>
        <a href="myprof.php" id="lnk3">My Profile</a>
        <a href="logout.php" id="lnk2">Log out</a>

        <!-- Notification Bell -->
        <div class="notification" id="notificationWrap">
          <div id="notifIcon" class="bell" title="Notifications" aria-haspopup="true" aria-expanded="false">
            🔔
            <span id="notifDot"></span>
            <span id="notifBadge">0</span>
          </div>
          <div id="notifDropdown" class="dropdown" aria-hidden="true">
            <!-- Populated by JS -->
          </div>
        </div>
    </nav>
</header>
