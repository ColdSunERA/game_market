document.addEventListener('DOMContentLoaded', function () {

  function createModal(imageUrl) {
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(0,0,0,0.6)';
    overlay.style.display = 'flex';
    overlay.style.justifyContent = 'center';
    overlay.style.alignItems = 'center';
    overlay.style.zIndex = '9999';

    const modal = document.createElement('div');
    modal.style.backgroundColor = '#fff';
    modal.style.padding = '1rem';
    modal.style.borderRadius = '8px';
    modal.style.maxWidth = '90%';
    modal.style.maxHeight = '90%';
    modal.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
    modal.style.overflow = 'auto';

    const img = document.createElement('img');
    img.src = imageUrl;
    img.style.maxWidth = '100%';
    img.style.height = 'auto';
    modal.appendChild(img);

    const closeBtn = document.createElement('button');
    closeBtn.textContent = 'Close';
    closeBtn.style.marginTop = '1rem';
    closeBtn.addEventListener('click', () => document.body.removeChild(overlay));
    modal.appendChild(closeBtn);

    overlay.appendChild(modal);
    document.body.appendChild(overlay);

    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) document.body.removeChild(overlay);
    });
  }

  document.querySelectorAll('.view-item-image').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const imageUrl = this.getAttribute('data-image');
      createModal(imageUrl);
    });
  });
});
