function activeTab (tab) {
    const tabId = document.getElementById(tab);
    tabId.classList.add('active');
    tabId.classList.add('bg-gradient-primary');
}