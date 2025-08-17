// MedNest Dashboard JavaScript
class MedNestDashboard {
    constructor() {
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.initializeComponents();
        this.setupSearchFunctionality();
    }

    setupEventListeners() {
        // Sidebar navigation
        this.handleSidebarNavigation();
        
        // Quick action buttons
        this.handleQuickActions();
        
        // Activity items
        this.handleActivityItems();
    }

    handleSidebarNavigation() {
        const sidebarLinks = document.querySelectorAll('.sidebar-nav .nav-link');
        
        sidebarLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Remove active class from all links
                sidebarLinks.forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                link.classList.add('active');
                
                // Get the section name
                const sectionName = link.querySelector('i').nextSibling.textContent.trim();
                
                // Show notification
                this.showNotification(`Navigated to ${sectionName}`, 'info');
                
                // In a real app, you would navigate to different routes here
                // window.location.href = link.href;
            });
        });
    }

    handleQuickActions() {
        const actionBtns = document.querySelectorAll('.action-btn');
        
        actionBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Add loading animation
                const originalContent = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i><span>Loading...</span>';
                btn.style.pointerEvents = 'none';
                
                // Get action name
                const actionName = btn.querySelector('span').textContent;
                
                // Simulate API call
                setTimeout(() => {
                    // Restore original content
                    btn.innerHTML = originalContent;
                    btn.style.pointerEvents = 'auto';
                    
                    // Show success message
                    this.showNotification(`${actionName} action triggered!`, 'success');
                }, 1000);
            });
            
            // Add hover effect
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-3px)';
                btn.style.boxShadow = '0 6px 12px rgba(0,0,0,0.15)';
            });
            
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translateY(0)';
                btn.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            });
        });
    }

    handleActivityItems() {
        const activityItems = document.querySelectorAll('.activity-item');
        
        activityItems.forEach(item => {
            item.addEventListener('click', () => {
                // Highlight the clicked item
                activityItems.forEach(i => i.classList.remove('selected'));
                item.classList.add('selected');
                
                // Get activity details
                const activity = item.querySelector('.activity-details strong').textContent;
                const patient = item.querySelector('.activity-details small').textContent;
                
                this.showNotification(`Selected: ${activity} for ${patient}`, 'info');
            });
        });
    }

    setupSearchFunctionality() {
        const searchInput = document.querySelector('.search-box input');
        
        if (searchInput) {
            // Real-time search (debounced)
            let searchTimeout;
            
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                
                searchTimeout = setTimeout(() => {
                    this.performSearch(e.target.value);
                }, 300);
            });
            
            // Search on Enter
            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    this.performSearch(e.target.value);
                }
            });
        }
    }

    performSearch(query) {
        if (query.trim() === '') {
            this.showNotification('Please enter a search term', 'warning');
            return;
        }
        
        // Simulate search
        this.showNotification(`Searching for: "${query}"`, 'info');
        
        // In a real app, you would make an AJAX call here
        // this.makeAjaxCall('/api/search', { query: query });
    }

    initializeComponents() {
        // Initialize tooltips if needed
        this.initTooltips();
        
        // Animate stats on load
        this.animateStats();
        
        // Setup real-time updates (demo)
        this.setupRealTimeUpdates();
    }

    initTooltips() {
        // Initialize Bootstrap tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    animateStats() {
        const statNumbers = document.querySelectorAll('.stats-number');
        
        statNumbers.forEach(stat => {
            const finalValue = stat.textContent;
            
            // Only animate numbers (not currency or decimals)
            if (/^\d+$/.test(finalValue)) {
                const increment = Math.ceil(parseInt(finalValue) / 100);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    
                    if (current >= parseInt(finalValue)) {
                        stat.textContent = finalValue;
                        clearInterval(timer);
                    } else {
                        stat.textContent = current;
                    }
                }, 20);
            }
        });
    }

    setupRealTimeUpdates() {
        // Simulate real-time updates every 30 seconds
        setInterval(() => {
            this.updateStats();
        }, 30000);
    }

    updateStats() {
        // Simulate slight changes in stats
        const statsNumbers = document.querySelectorAll('.stats-number');
        
        statsNumbers.forEach(stat => {
            const currentValue = stat.textContent;
            
            if (/^\d+$/.test(currentValue)) {
                const change = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                const newValue = Math.max(0, parseInt(currentValue) + change);
                stat.textContent = newValue;
                
                // Flash effect
                stat.style.backgroundColor = '#fff3cd';
                setTimeout(() => {
                    stat.style.backgroundColor = '';
                }, 1000);
            }
        });
    }

    showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show notification-toast`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.3s ease;
        `;
        
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100%)';
            
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

    // AJAX helper method
    makeAjaxCall(url, data, method = 'POST') {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            this.showNotification('Operation successful!', 'success');
        })
        .catch((error) => {
            console.error('Error:', error);
            this.showNotification('An error occurred!', 'danger');
        });
    }
}

// Initialize dashboard when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new MedNestDashboard();
});

// Export for use in other files if needed
window.MedNestDashboard = MedNestDashboard;