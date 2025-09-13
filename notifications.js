// notifications.js
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
      if(lastData){
        lastData.last_seen_eid = json.max_eid || lastData.last_seen_eid;
        lastData.new_count = 0;
        lastData.has_new = false;
      }
      updateBadges(lastData || { new_count: 0, has_new: false, auth: true });
      renderDropdown(lastData || { events: [] , new_count: 0, auth: true });
    } else {
      alert(json.message || 'Could not mark as read.');
    }
  } catch(e){
    console.error(e);
    alert('Network error while marking as read.');
  }
}

// Toggle dropdown
document.addEventListener('DOMContentLoaded', () => {
  document.getElementById('notifIcon').addEventListener('click', async () => {
    const dropdown = document.getElementById('notifDropdown');
    dropdownOpen = dropdown.style.display !== 'block';
    dropdown.style.display = dropdownOpen ? 'block' : 'none';
    document.getElementById('notifIcon').setAttribute('aria-expanded', dropdownOpen ? 'true':'false');
    dropdown.setAttribute('aria-hidden', dropdownOpen ? 'false':'true');
    if(dropdownOpen){
      await fetchNotifications(true);
      if(lastData) renderDropdown(lastData);
    }
  });

  document.addEventListener('click', (e) => {
    const wrap = document.getElementById('notificationWrap');
    if(!wrap.contains(e.target)){
      document.getElementById('notifDropdown').style.display = 'none';
      dropdownOpen = false;
    }
  });

  fetchNotifications(false);
  setInterval(fetchNotifications, 10000);
});
