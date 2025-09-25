document.addEventListener('DOMContentLoaded', function(){
        const tabs = document.querySelectorAll('.awea-tabs-nav li[data-tab]');
        const panes = document.querySelectorAll('.awea-tab-pane');

        tabs.forEach(tab => {
            tab.addEventListener('click', function(){
                tabs.forEach(t => t.classList.remove('active'));
                panes.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                document.getElementById(this.dataset.tab).classList.add('active');
            });
        });

        // Activate first tab
        if(tabs.length) tabs[0].click();
    });