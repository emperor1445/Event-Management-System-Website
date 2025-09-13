<?php
    session_start();
    $usertype=$_SESSION['usertype'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Events</title>
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


        .but {
            padding: 10px 25px;
            background-color: #443eb3;
            color: #fff;
            font-weight: 600;
            margin: 20px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
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

        .profile{
    justify-content: center;
    width: 100%;
    display: flex;
    background-color: #443eb3;
    border-radius: 10px 10px 0 0 ;
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




     .foco {
        width: 100%;
        background-color: #bc5312;
        color: white;
        display: flex;
        box-sizing: border-box;
        justify-content: space-around;
        align-content: center;
        align-items: center;
        margin-top: 10px;
    }
    
    
    section.card {
      position: relative;
      width: 350px;
      height: 350px;
      background-image: url(img/ahmed.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      perspective: 1000px;
      transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px #000000;
      background-color: #f2f2f2;
      color: #ffffff;
    }
    
    .card__content {
      color: #000000;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      padding: 20px;
      box-sizing: border-box;
      background-color: #f2f2f2;
      transform: rotateX(-90deg);
      transform-origin: bottom;
      transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .card:hover .card__content {
      transform: rotateX(0deg);
    }
    
    .card__title {
      margin: 0;
      padding-left: 5px;
      font-size: 18px;
      color: #000000;
      font-weight: 700;
    }
    
    
    
    .card__description {
      margin: 10px ;
      display: flex;
      flex-direction: column;
      font-size: 16px;
      color: #000000;
      line-height: 1.4;
      list-style: square;
      
    }
    .elist{
        padding-bottom: 15px;
        color: #e06112;
    }
    /* Commands to change the shadows in dark mode
    @media (prefers-color-scheme: dark) {
      .card:hover {
      box-shadow: 0 8px 16px #000000;
      }
    }*/

    /* Event styles */
.event {
    padding: 20px;
}
  .enin {
    width: 95%;
    margin-right: 0;
  }

  .evgrp {
    flex-direction: row;
    align-items: center;
  }


.enin:hover img {
    transform: scale(1.8);
    filter: blur(4px) brightness(90%) ;
}

.enin img {
    width: 100%;
    transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
}


#pagination {
    text-align: center; /* توسيط أزرار التنقل */
    margin-top: 20px; /* إضافة مسافة بين الأزرار وبطاقات الأحداث */
}

#pagination button {
    padding: 5px 10px; /* تحديد حجم الأزرار */
    margin-right: 5px; /* مسافة بين الأزرار */
    background-color: #3d4e9c; /* لون الخلفية للأزرار */
    border: none; /* لا حدود للأزرار */
    color: white; /* لون النص */
    border-radius: 5px; /* الحواف الدائرية للأزرار */
    cursor: pointer; /* تغيير شكل المؤشر إلى يد عند المرور على الأزرار */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.519);
}

#pagination button:hover {
    background-color: #0056b3; /* تغيير لون الخلفية عند المرور بالمؤشر */
    transform: scale(1.1);
    transition: 0.8s;
}


.event-info {
    padding: 15px;
    text-align: center;
    transition: opacity 0.3s ease-in-out;
}

.enin:hover .event-info {
    opacity: 0;
}

.event-details {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    display: none;
}

.enin:hover .event-details {
    display: block;
}

.evgrp {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.evimg{
    width: min-content;
}


.enin {
    
    position: relative;
    background-color: #FFFFFF;
    box-shadow: 4px 4px 20px #3d4e9c;
    border-radius: 10px;
    width: 45%;
    margin: 10px auto;
    margin-right: 21px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
}




.enin:hover img {
    transform: scale(2);
    filter: blur(4px) brightness(20%);
    
}

.enin img {
    max-width: 100%;
    max-height:350px ;
    transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
}

.event-info {
    padding: 15px;
    width: 100%;
    text-align: center;
    transition: opacity 0.3s ease-in-out;
    opacity: 1;
}

.enin:hover .event-info {
    opacity: 0;
}

.event-details {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    display: none;
}

.enin:hover .event-details {
    display: block;
}

.h2{ color: #E91E63}
    

/* Responsive improvements for smaller screens */
@media screen and (max-width: 1024px) {
  .enin {
    width: 20%;
  }

  .objective {
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }

  .abimg1 {
    width: 90%;
    transform: none;
    border-radius: 10px;
  }

  .sticky,
  .container {
    flex-direction: column;
    align-items: flex-start;
    padding: 10px;
  }

  header {
    flex-direction: column;
    align-items: flex-start;
  }



  .fotcont {
    flex-direction: column;
    text-align: center;
    gap: 20px;
  }

  .foco {
    flex-direction: column;
    padding: 10px;
  }

  .btnstf {
    flex-direction: column;
    gap: 10px;
  }

  #btnlft,
  #btnrt {
    margin: 5px auto;
  }

  .card {
    width: 90%;
    height: auto;
  }
}

@media screen and (max-width: 768px) {
  .enin {
    width: 95%;
    margin-right: 0;
  }

  .evgrp {
    flex-direction: column;
    align-items: center;
  }

  .intro {
    height: auto;
    padding: 60px 20px;
    gap: 20px;
    text-align: center;
  }
}
            </style>
    
    
</head>
<body>


<header class="container" id="myHeader">
    <div class="logo">
        <img src="logo.png" alt="logo">
    </div>
    <nav class="nav">
        <a href="home.php" id="lnk1">Home</a>
        <a href="events.php" id="lnk3">Events</a>
        <a href="myprof.php" id="lnk2">My profile</a>

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

    
    <section class="event">
        <div class="evgrp">
        <?php
        include('dbconnection.php');
        function getFirst20Words($str) {
            // Split the string into words
            $words = explode(' ', $str);
        
            // Extract the first 20 words
            $first_20_words = array_slice($words, 0, 20);
        
            // Join the first 20 words back into a string
            $result = implode(' ', $first_20_words);
        
            return $result;
        }


        $sql="SELECT * from event ORDER BY EID DESC;";
        $stmt=$conn->query($sql);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $n=$stmt->rowCount();
        foreach($rows as $row){
            echo "<div class=enin>";
            echo "<img src=\"img/uploaded/eventimg/{$row['EIMG']}\" class=\"evimg\">";
            echo "<div class=\"event-info\">";
            echo "<p>Event name: {$row['EName']}</p>";
            echo "<p>Event date: from {$row['StartDate']} to {$row['EndDate']}</p>";
            echo "</div>";
            echo "<div class=\"event-details\">";
            echo "<p>".getFirst20Words($row['EDisc'])."...</p>";
            echo "<form action=\"evins.php\" method=\"get\">";
            echo "<input type=\"hidden\" name=\"EID\" value=\"{$row['EID']}\">";
            echo "<button type=\"submit\" class=\"but\" name=\"more\">View Details</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        ?>

        </div>
        <div id="pagination">
            <button id="prevPage">&laquo; Previous</button> <!-- زر الصفحة السابقة -->
            <!-- أزرار الصفحات الرقمية سيتم إنشاؤها هنا بواسطة JavaScript -->
            <button id="nextPage">Next &raquo;</button> <!-- زر الصفحة التالية -->
        </div>
    </section>

<footer style="
    background-color: #e06112;
    color: white;
    text-align: center;
    padding: 30px 20px;
    margin-top: 50px;
    font-family: Arial, sans-serif;
">
    <div>
        <h3 style="margin-bottom: 10px;">Department of Computer Science</h3>
        <p style="margin: 5px 0;">© 2025 Rivers State University</p>
        <p style="margin: 5px 0;">Nkpolu-Oroworukwo, Port Harcourt, Nigeria</p>
        <div style="margin-top: 15px;">
            <a href="mailto:csdept@rsu.edu.ng" style="color: white; text-decoration: underline; margin-right: 10px;">Email Us</a>
            |
            <a href="#" style="color: white; text-decoration: underline; margin-left: 10px;">Visit Website</a>
        </div>
    </div>
</footer>


    <script>
document.addEventListener("DOMContentLoaded", function() {
    const cardsPerPage = 6;
    const container = document.querySelector(".evgrp");
    const cards = Array.from(container.children);
    const totalPages = Math.ceil(cards.length / cardsPerPage);
    let currentPage = 1; 

    function showPage(page) {
        if (page < 1 || page > totalPages) return; 
        currentPage = page; 
        container.innerHTML = ''; 
        const start = (page - 1) * cardsPerPage;
        const end = start + cardsPerPage;
        cards.slice(start, end).forEach(card => {
            container.appendChild(card);
        });
    }

    function setupPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';


        const prevBtn = document.createElement('button');
        prevBtn.textContent = '«';
        prevBtn.onclick = () => showPage(currentPage - 1);
        pagination.appendChild(prevBtn);

    
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            btn.className = currentPage === i ? 'active' : '';
            btn.onclick = () => showPage(i);
            pagination.appendChild(btn);
        }

        
        const nextBtn = document.createElement('button');
        nextBtn.textContent = '»';
        nextBtn.onclick = () => showPage(currentPage + 1);
        pagination.appendChild(nextBtn);
    }

    setupPagination();
    showPage(1);
});

        
        </script>
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
            <script>
                AOS.init();
              </script>