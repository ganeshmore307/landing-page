(function(){
  const root = window.AACRM && AACRM.root;
  async function loadLeads(){
    if(!root || !window.wp || !wp.apiFetch) return;
    const leads = await wp.apiFetch({path:'/aacrm/v1/leads?tenant_id=1'}).catch(()=>[]);
    document.querySelector('[data-metric="total_leads"]')?.replaceChildren(String(leads.length));
    document.querySelector('[data-metric="qualified_leads"]')?.replaceChildren(String(leads.filter(l=>Number(l.score)>=75).length));
    for(const lead of leads){
      const stage = lead.stage || 'new_lead';
      const zone = document.querySelector(`[data-stage="${stage}"] .aacrm-dropzone`);
      if(!zone) continue;
      const card = document.createElement('div'); card.className='aacrm-card'; card.draggable=true; card.dataset.id=lead.id;
      card.innerHTML = `<strong>${lead.name}</strong><p>${lead.ai_summary||''}</p><span class="aacrm-badge">${lead.temperature} · ${lead.score}/100</span>`;
      zone.appendChild(card);
    }
  }
  document.addEventListener('dragstart', e=>{ if(e.target.classList.contains('aacrm-card')) e.dataTransfer.setData('text/plain', e.target.dataset.id); });
  document.addEventListener('dragover', e=>{ if(e.target.closest('.aacrm-column')) e.preventDefault(); });
  document.addEventListener('drop', async e=>{ const col=e.target.closest('.aacrm-column'); if(!col||!window.wp) return; e.preventDefault(); const id=e.dataTransfer.getData('text/plain'); await wp.apiFetch({path:`/aacrm/v1/leads/${id}/stage`,method:'POST',data:{stage:col.dataset.stage}}); location.reload(); });
  document.addEventListener('DOMContentLoaded', loadLeads);
})();
