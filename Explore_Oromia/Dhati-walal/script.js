// Function to switch tabs
function switchTab(tabId) {
    // Hide all tab content
    document.querySelectorAll('.tab-content').forEach((tab) => {
      tab.style.display = 'none';
    });
  
    // Remove active class from all nav links
    document.querySelectorAll('.nav-link').forEach((link) => {
      link.classList.remove('active');
    });
  
    // Show the selected tab content
    document.getElementById(tabId).style.display = 'block';
  
    // Add active class to the clicked nav link
    document.querySelector(`[href="#${tabId}"]`).classList.add('active');
  }
  
  // Add event listeners to nav links
  document.querySelectorAll('.nav-link').forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault(); // Prevent default link behavior
      const tabId = link.getAttribute('href').substring(1); // Get tab ID
      switchTab(tabId); // Switch to the selected tab
    });
  });
  
  // Show the default tab on page load
  document.addEventListener('DOMContentLoaded', () => {
    switchTab('welcome');
  });