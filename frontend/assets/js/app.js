function showToast(message) {
  let toast = document.getElementById("toast");
  toast.innerText = message;
  toast.style.display = "block";

  setTimeout(() => {
    toast.style.display = "none";
  }, 3000);
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
  console.log('The Expert Academy loaded successfully');
  checkUserAuth();
  setupScrollAnimations();
});

// Check if user is authenticated
function checkUserAuth() {
  const user = localStorage.getItem('user');
  if (user) {
    console.log('User logged in:', JSON.parse(user));
  }
}

// Logout function
function logout() {
  localStorage.removeItem('user');
  window.location.href = 'index.html';
}

// Setup smooth scroll animations
function setupScrollAnimations() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, observerOptions);

  document.querySelectorAll('.card, .feature-box').forEach(element => {
    element.style.opacity = '0';
    element.style.transform = 'translateY(20px)';
    element.style.transition = 'all 0.5s ease';
    observer.observe(element);
  });
}