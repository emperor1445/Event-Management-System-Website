

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departmental Events & Notification System</title>
    <link rel="stylesheet" href="index.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #fff;
        }

        .container{
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 99.5%;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            width: 100%;
            color: black;
            background-color:white;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.569),3px 3px 5px rgba(0, 0, 0, 0.569);
            transition: 0.5s;
            padding-bottom: 5px;
            z-index: 1000; /* or any higher value */
        }
        .logo{
            display: flex;
            margin: 0px 0px 3px 17px;
        }
        .logo img{
            width: 65px;
        }
        .nav{
            display: flex;
            justify-content: space-around;
            flex-direction: row;
            align-items: center;
        }
        
        .nav a{
            padding-right: 2rem;
            text-decoration: none;
            font-weight: 700;
            font-size: large;
            color: black;
            font-weight: 900;
            transition: 0.3s;
        }
        .nav a:hover{
            transform: scale(1.1);
            transition-duration: 0.6s;
            color: black;
            text-shadow:3px 3px 4px black;
        }

/* Notifications */
.notification { position: relative; margin-right: 30px; cursor: pointer; }
.bell { font-size: 24px; position: relative; user-select: none; }
#notifDot { width: 8px; height: 8px; background: red; border-radius: 50%; position: absolute; top: -3px; right: -6px; display: none; box-shadow: 0 0 0 2px white; }
#notifBadge { 
  position: absolute; top: -10px; right: -14px; 
  min-width: 18px; height: 18px; padding: 0 6px; 
  background: red; color: #fff; font-size: 12px; line-height: 18px; 
  text-align: center; border-radius: 999px; display: none; font-weight: 700; 
  box-shadow: 0 0 0 2px white;
}
.dropdown {
  display: none; position: absolute; right: 0; top: 34px; 
  background: #fff; width: 360px; max-height: 420px; overflow-y: auto; 
  border-radius: 8px; box-shadow: 0 8px 20px rgba(0,0,0,.18); z-index: 3000;
}
.dropdown .header { 
  display:flex; align-items:center; justify-content:space-between; 
  padding: 10px 12px; border-bottom:1px solid #eee; position: sticky; top:0; background:#fff; z-index:1;
}
.dropdown .header .title { font-weight: 800; }
.dropdown .header .actions { display:flex; gap:8px; }
.dropdown .btn { 
  border: 1px solid #ddd; background:#f8f8f8; padding:6px 10px; border-radius:6px; 
  font-size: 12px; cursor: pointer;
}
.dropdown .btn.primary { border-color:#443eb3; background:#443eb3; color:#fff; }
.dropdown .btn:disabled { opacity:.6; cursor:not-allowed; }
.dropdown .item { padding: 10px 12px; border-bottom: 1px solid #f1f1f1; cursor: pointer; }
.dropdown .item:hover { background: #f9f9f9; }
.dropdown .item .title { font-weight: 700; margin-bottom: 4px; }
.dropdown .empty, .dropdown .error { padding: 14px; color: #666; text-align:center; }




        .but {
            padding: 10px 25px;
            background-color: #443eb3;
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .but:hover {
            background-color: #e06112;
        }

        section.hero {
            padding: 100px 20px 60px;
            text-align: center;
            background-color: #f4f4f4;
        }

        section.hero img {
            width: 300px;
            max-width: 80%;
            border-radius: 10px;
            margin-top: 30px;
        }

        section.content {
            padding: 60px 20px;
            background-color: white;
            text-align: center;
        }

        .content p, .hero p {
            max-width: 700px;
            margin: 20px auto;
            font-size: 1.1rem;
        }

        footer {
            background-color: #bc5312;
            color: white;
            text-align: center;
            padding: 40px 20px;
        }

        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
    </style>
</head>
<body>

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

<section class="hero">
    <h1 style="font-size: 2.5em; color: #443eb3">
        Departmental Events & Notification System
    </h1>
    <p>
        Stay updated with departmental events, deadlines, and announcements — all in one place.
    </p>

    <img src="img/illustration3.png" alt="illustration">
</section>

<section class="content">
    <h2 style="color: #e06112;">Why This Platform?</h2>
    <p>
        This system is designed to simplify communication within the Department of Computer Science, Rivers State University.
        It provides a centralized, student-friendly platform for real-time updates, event registration, and streamlined interaction
        between students and staff.
    </p>
</section>

<footer>
    <div>
        <h3>Department of Computer Science</h3>
        <p>© 2025 Rivers State University</p>
        <p>Nkpolu-Oroworukwo, Port Harcourt, Nigeria</p>
        <div style="margin-top: 10px;">
            <a href="mailto:csdept@rsu.edu.ng">Email Us</a> |
            <a href="#">Visit Website</a>
        </div>
    </div>
</footer>

<script>
let dropdownOpen = false;
let lastData = null;

function truncate(str, n){ if(!str) return ''; return (str.length>n)? str.substr(0,n-1)+'…': str; }
function escapeHtml(t){ if(!t) return ''; return t.replace(/[&<>"'\/]/g, s=>({ "&":"&amp;","<":"&lt;",">":"&gt;",'"':'&quot;',"'":'&#39;',"/":'&#x2F;' }[s])); }

async function fetchNotifications(showSpinner=false){
  const dropdown = document.getElementById('notifDropdown');
  if(showSpinner){ dropdown.innerHTML = '<div class="empty">Loading…</div>'; }
  try {
    const res = await fetch('get_notifications.php', { cache: 'no-store' });
    if(!res.ok) throw new Error('Network error');
    const data = await res.json();
    lastData = data;
    updateBadges(data);
    if(dropdownOpen){ renderDropdown(data); }
  } catch (e) {
    console.error(e);
    if(dropdownOpen){
      dropdown.innerHTML = '<div class="error">Couldn\'t load notifications. <button class="btn" onclick="fetchNotifications(true)">Retry</button></div>';
    }
  }
}

function updateBadges(data){
  const badge = document.getElementById('notifBadge');
  const dot = document.getElementById('notifDot');
  const count = (data && typeof data.new_count === 'number') ? data.new_count : 0;

  if(count > 0){
    badge.style.display = 'inline-block';
    badge.textContent = count > 99 ? '99+' : String(count);
    dot.style.display = 'none';
  } else {
    badge.style.display = 'none';
    // show a tiny dot only if there are events at all (for not-logged-in case)
    dot.style.display = (data && data.has_new && !data.auth) ? 'block' : 'none';
  }
}

function renderDropdown(data){
  const dropdown = document.getElementById('notifDropdown');
  const events = (data && Array.isArray(data.events)) ? data.events : [];
  const count = data ? (data.new_count || 0) : 0;
  const auth = !!(data && data.auth);

  let html = '';
  html += '<div class="header">';
  html +=   '<div class="title">Notifications</div>';
  html +=   '<div class="actions">';
  html +=     `<button class="btn" onclick="window.location.href='events.php'">View all</button>`;
  html +=     `<button id="markAllBtn" class="btn primary" ${(!auth || count===0) ? 'disabled' : ''} onclick="markAllRead()">Mark all as read</button>`;
  html +=   '</div>';
  html += '</div>';

  if(events.length === 0){
    html += '<div class="empty">No recent events</div>';
  } else {
    events.forEach(ev => {
      const title = escapeHtml(ev.EName || 'Untitled');
      const desc  = escapeHtml(truncate(ev.EDisc || '', 100));
      const dates = escapeHtml(`${ev.StartDate || ''}${ev.EndDate ? ' → '+ev.EndDate : ''}`);
      html += `<div class="item" onclick="window.location.href='events.php?id=${ev.EID}'">
                 <div class="title">${title}</div>
                 <div style="font-size:.9rem;color:#666;">${dates}</div>
                 <div style="font-size:.9rem;color:#444;margin-top:2px;">${desc}</div>
               </div>`;
    });
  }

  dropdown.innerHTML = html;
}

async function markAllRead(){
  try{
    const res = await fetch('mark_notifications_read.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, cache: 'no-store' });
    const json = await res.json();
    if(json && json.success){
      // reset counters locally
      if(lastData){
        lastData.last_seen_eid = json.max_eid || lastData.last_seen_eid;
        lastData.new_count = 0;
        lastData.has_new = false;
      }
      updateBadges(lastData || { new_count: 0, has_new: false, auth: true });
      // also refresh list in case you want to reflect "read" state immediately
      renderDropdown(lastData || { events: [] , new_count: 0, auth: true });
    } else {
      alert(json.message || 'Could not mark as read.');
    }
  } catch(e){
    console.error(e);
    alert('Network error while marking as read.');
  }
}

// Toggle dropdown — ALWAYS open, even before data loads
document.getElementById('notifIcon').addEventListener('click', async () => {
  const dropdown = document.getElementById('notifDropdown');
  dropdownOpen = dropdown.style.display !== 'block';
  dropdown.style.display = dropdownOpen ? 'block' : 'none';
  document.getElementById('notifIcon').setAttribute('aria-expanded', dropdownOpen ? 'true':'false');
  dropdown.setAttribute('aria-hidden', dropdownOpen ? 'false':'true');

  if(dropdownOpen){
    // ensure content is present when opened
    await fetchNotifications(true);
    if(lastData) renderDropdown(lastData);
  }
});

// click-away to close
document.addEventListener('click', (e) => {
  const wrap = document.getElementById('notificationWrap');
  const dropdown = document.getElementById('notifDropdown');
  if(!wrap.contains(e.target)){
    dropdown.style.display = 'none';
    dropdownOpen = false;
  }
});

// Initial fetch + polling
fetchNotifications(false);
setInterval(fetchNotifications, 10000);
</script>


</body>
</html>
